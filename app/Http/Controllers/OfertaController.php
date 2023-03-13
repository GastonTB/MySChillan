<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
//carbon
use Carbon\Carbon;


class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $productos = Producto::withTrashed()->where('oferta_id', '!=', 0)->with('oferta')->latest()->paginate(10);
        foreach ($productos as $producto) {
            $producto->precio = number_format($producto->precio, 0, ",", ".");
            $producto->oferta->precio_oferta = number_format($producto->oferta->precio_oferta, 0, ",", ".");
        }
        if (count($productos) == 0) {
            $productos->mensaje = 'No hay Ofertas disponibles';
        }
        return view('ofertas.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $producto = Producto::find($id);
        if ($producto == null) {
            Alert::error('Error', 'El producto ingresado no existe');
            return redirect()->route('backoffice');
        }
        if ($producto->oferta != null) {
            Alert::error('Error', 'El producto ingresado ya posee oferta');
            return redirect()->route('backoffice');
        }

        return view('ofertas.create', compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id_producto;
        $producto = Producto::find($id);
        if ($producto == null) {
            Alert::error('Error', 'El producto ingresado no existe');
            return redirect()->back();
        }
        $oferta = Oferta::find($producto->oferta_id);

        if ($oferta != null) {
            Alert::error('Error', 'El producto ya tiene una oferta');
            return redirect()->back();
        }

        $oferta = str_replace('.', '', $request->oferta); // quitar puntos
        $oferta = str_replace('$', '', $oferta); // quitar el signo $
        if (!is_numeric($oferta) || $oferta < 100 || $oferta >= $producto->precio) {
            Alert::error('Error', 'La oferta debe ser mayor o igual a $100 y menor que el precio del producto.');
            return redirect()->back();
        }

        $messages = [
            'fecha_ini.required' => 'El campo Fecha Inicio es obligatorio.',
            'fecha_ini.date' => 'El campo Fecha Inicio debe ser una fecha válida.',
            'fecha_ini.after_or_equal' => 'El campo Fecha Inicio debe ser igual o posterior a hoy.',
            'fecha_ini.before' => 'El campo Fecha Inicio debe ser anterior a Fecha Termino.',
            'fecha_ini.date_format' => 'El campo Fecha Inicio debe tener formato AAAA-MM-DD.',
            'fecha_ter.required' => 'El campo Fecha Termino es obligatorio.',
            'fecha_ter.date' => 'El campo Fecha Termino debe ser una fecha válida.',
            'fecha_ter.after' => 'El campo Fecha Termino debe ser posterior a Fecha Inicio.',
            'fecha_ter.date_format' => 'El campo Fecha Termino debe tener formato AAAA-MM-DD.',
        ];

        $validator = Validator::make($request->all(), [
            'fecha_ini' => ['required', 'date', 'date_format:Y-m-d', 'after_or_equal:today', 'before:fecha_ter'],
            'fecha_ter' => ['required', 'date', 'date_format:Y-m-d', 'after:fecha_ini'],
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $fechaIni = Carbon::createFromFormat('Y-m-d', $request->fecha_ini);
        $fechaFin = Carbon::createFromFormat('Y-m-d', $request->fecha_ter);
        if ($fechaFin->diffInDays($fechaIni) < 1) {
            Alert::error('Error', 'Debe haber al menos un día de diferencia entre la fecha de inicio y la fecha de término de la oferta.');
            return redirect()->back()->withInput();
        }

        $activa = 0;
        $fechaIni = Carbon::createFromFormat('Y-m-d', $request->fecha_ini);
        if ($fechaIni->isToday()) {
            $activa = 1;
        }

        $oferta = str_replace(array('$', '.'), '', $request->oferta);
        if (!is_numeric($oferta)) {
            Alert::error('Error', 'El campo "oferta" debe ser un valor numérico.');
            return redirect()->back()->withInput();
        }
        if ($oferta < 100) {
            Alert::error('Error', 'La oferta debe ser de al menos $100.');
            return redirect()->back()->withInput();
        }
        if ($oferta > $producto->precio - 1) {
            Alert::error('Error', 'La oferta no puede superar el precio del producto menos $1.');
            return redirect()->back()->withInput();
        }

        // Si todas las validaciones pasan, crear la nueva oferta


        $oferta = new Oferta([
            'precio_oferta' => $oferta,
            'fecha_inicio' => $request->fecha_ini,
            'fecha_fin' => $request->fecha_ter,
            'estado_oferta' => $activa
        ]);
        $oferta->save();

        $producto->oferta_id = $oferta->id;
        $producto->save();

        Alert::success('La oferta', 'Ha sido aplicada correctamente sobre el producto');
        return redirect()->route('listado-productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $producto = Producto::find($id);
        if ($producto == null) {
            Alert::error('Error', 'El producto ingresado no existe');
            return redirect()->route('backoffice');
        }
        $oferta = Oferta::find($producto->oferta_id);
        if ($oferta == null) {
            Alert::error('Error', 'El producto no tiene una oferta');
            return redirect()->route('backoffice');
        }

        return view('ofertas.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = $request->id_producto;

        if ($id == null) {
            Alert::error('Error', 'No se pudo editar la oferta');
            return redirect()->route('backoffice');
        }

        $producto = Producto::find($id);

        if ($producto == null) {
            Alert::error('Error', 'Existe el producto');
            return redirect()->route('backoffice');
        }

        $oferta_id = $producto->oferta_id;


        $oferta = Oferta::find($oferta_id);
        if ($oferta == null) {
            Alert::error('Error', 'No se pudo editar la oferta');
            return redirect()->route('backoffice');
        }

        $producto = Producto::find($id);
        if ($producto == null) {
            Alert::error('Error', 'El producto ingresado no existe');
            return redirect()->route('backoffice');
        }
        $oferta = Oferta::find($producto->oferta_id);
        if ($oferta == null) {
            Alert::error('Error', 'El producto no tiene una oferta');
            return redirect()->route('backoffice');
        }

        $oferta = str_replace('.', '', $request->oferta); // quitar puntos
        $oferta = str_replace('$', '', $oferta); // quitar el signo $
        if (!is_numeric($oferta) || $oferta < 100 || $oferta >= $producto->precio) {
            Alert::error('Error', 'La oferta debe ser mayor o igual a $100 y menor que el precio del producto.');
            return redirect()->back();
        }

        $messages = [
            'fecha_ini.required' => 'El campo Fecha Inicio es obligatorio.',
            'fecha_ini.date' => 'El campo Fecha Inicio debe ser una fecha válida.',
            'fecha_ini.after_or_equal' => 'El campo Fecha Inicio debe ser igual o posterior a hoy.',
            'fecha_ini.before' => 'El campo Fecha Inicio debe ser anterior a Fecha Termino.',
            'fecha_ini.date_format' => 'El campo Fecha Inicio debe tener formato AAAA-MM-DD.',
            'fecha_ter.required' => 'El campo Fecha Termino es obligatorio.',
            'fecha_ter.date' => 'El campo Fecha Termino debe ser una fecha válida.',
            'fecha_ter.after' => 'El campo Fecha Termino debe ser posterior a Fecha Inicio.',
            'fecha_ter.date_format' => 'El campo Fecha Termino debe tener formato AAAA-MM-DD.',
        ];

        $validator = Validator::make($request->all(), [
            'fecha_ini' => ['required', 'date', 'date_format:Y-m-d', 'after_or_equal:today', 'before:fecha_ter'],
            'fecha_ter' => ['required', 'date', 'date_format:Y-m-d', 'after:fecha_ini'],
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $fechaIni = Carbon::createFromFormat('Y-m-d', $request->fecha_ini);
        $fechaFin = Carbon::createFromFormat('Y-m-d', $request->fecha_ter);
        if ($fechaFin->diffInDays($fechaIni) < 1) {
            Alert::error('Error', 'Debe haber al menos un día de diferencia entre la fecha de inicio y la fecha de término de la oferta.');
            return redirect()->back()->withInput();
        }

        $activa = 0;
        $fechaIni = Carbon::createFromFormat('Y-m-d', $request->fecha_ini);
        if ($fechaIni->isToday()) {
            $activa = 1;
        }

        $oferta = str_replace(array('$', '.'), '', $request->oferta);
        if (!is_numeric($oferta)) {
            Alert::error('Error', 'El campo "oferta" debe ser un valor numérico.');
            return redirect()->back()->withInput();
        }
        if ($oferta < 100) {
            Alert::error('Error', 'La oferta debe ser de al menos $100.');
            return redirect()->back()->withInput();
        }
        if ($oferta > $producto->precio - 1) {
            Alert::error('Error', 'La oferta no puede superar el precio del producto menos $1.');
            return redirect()->back()->withInput();
        }

        $ofer = Oferta::find($producto->oferta_id);
        if ($ofer == null) {
            Alert::error('Error', 'El producto no tiene una oferta');
            return redirect()->route('backoffice');
        }

        $ofer->precio_oferta = $oferta;
        $ofer->fecha_inicio = $request->fecha_ini;
        $ofer->fecha_fin = $request->fecha_ter;
        $ofer->estado_oferta = $activa;
        $ofer->save();

        Alert::success('La Oferta', 'Ha sido modificada con exito');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //elimina las ofertas
    public function destroy($id)
    {
        $oferta = Oferta::find($id);
        if ($oferta == null) {
            Alert::errror('Error', 'No se pudo borrar la oferta');
            return redirect()->route('backoffice');
        }
        $producto = Producto::where('oferta_id', $id)->first();
        if ($producto == null) {
            Alert::errror('Error', 'No se pudo borrar la oferta');
            return redirect()->route('backoffice');
        }
        $producto->oferta_id = null;
        $producto->save();
        $oferta->delete();
        Alert::success('Oferta Eliminada de Forma Exitosa', 'El precio del producto se ha restablecido');
        return redirect()->route('backoffice');
    }

    //retorna listado de ofertas activas
    public function ofertasActivas()
    {

        $productos = Producto::where('oferta_id', '!=', 0)
            ->whereHas('oferta', function ($query) {
                $query->where('estado_oferta', '=', 1);
            })
            ->with('oferta')
            ->latest()
            ->paginate(10);

        foreach ($productos as $producto) {
            $producto->precio = number_format($producto->precio, 0, ",", ".");
            $producto->oferta->precio_oferta = number_format($producto->oferta->precio_oferta, 0, ",", ".");
        }


        return view('ofertas.activas', compact('productos'));
    }

    public function ofertasFuturas()
    {
        $productos = Producto::with(['oferta' => function ($query) {
            $query->where('fecha_inicio', '>', Carbon::now())
                ->where('fecha_fin', '>', Carbon::now());
        }])->whereHas('oferta', function ($query) {
            $query->where('fecha_inicio', '>', Carbon::now())
                ->where('fecha_fin', '>', Carbon::now());
        })->paginate(10);

        foreach ($productos as $producto) {
            $producto->precio = number_format($producto->precio, 0, ",", ".");
            $producto->oferta->precio_oferta = number_format($producto->oferta->precio_oferta, 0, ",", ".");
        }

        return view('ofertas.futuras', compact('productos'));
    }
}
