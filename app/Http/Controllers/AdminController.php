<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Producto;
use App\Models\Oferta;
use App\Models\Categoria;
use App\Helpers\Helpers;
use App\Models\OrdenCompra;
use App\Models\Visitante;
use App\Models\Carrito;
use App\Models\User;
use App\Models\UserMetadata;
use App\Models\Comuna;
use RealRashid\SweetAlert\Facades\Alert;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::select('nombre_producto', 'cantidad')->get();
        //count productos by categoria_id
        $categorias = Categoria::all();
        $array = [];
        foreach ($categorias as $categoria) {
            $categoria->productos = Producto::where('categoria_id', $categoria->id)->count();
            $array[] = $categoria;
        }
        $ofertas = Helpers::getOfertas();
        //count productos by cantidad order by categoria
        $array2 = [];
        $categorias2 = Categoria::all();
        foreach ($categorias2 as $categoria2) {
            $categoria2->productos = Producto::where('categoria_id', $categoria2->id);
            $categoria2->productos = $categoria2->productos->sum('cantidad');
            $array2[] = $categoria2;
        }
        $orden = OrdenCompra::where('estado', 1)->orderBy('created_at', 'desc');

        $vendidos = OrdenCompra::where('estado', 1)->get();
        //calcula las cantidades vendidas de cada producto siendo vendidas que aparezcan en la relacion entre orden compra y producto, orden compra con estado 1
        $array3 = [];
        foreach ($productos as $producto) {
            $producto->cantidad = 0;
            foreach ($vendidos as $vendido) {
                foreach ($vendido->productos as $producto2) {
                    if ($producto->nombre_producto == $producto2->nombre_producto) {
                        $producto->cantidad += $producto2->pivot->cantidad_orden_compra;
                    }
                }
            }
            $array3[] = $producto;
        }

        //filtrar de array 3 los productos con cantidad 0
        $array4 = [];
        foreach ($array3 as $producto) {
            if ($producto->cantidad != 0) {
                $array4[] = $producto;
            }
        }

        //ordenar de mayor a menor por cantidad y solo dame 5
        $array5 = [];
        $i = 0;
        foreach ($array4 as $producto) {
            if ($i < 5) {
                $array5[] = $producto;
            }
            $i++;
        }
        $array5 = collect($array5)->sortByDesc('cantidad')->values()->all();
        $vendidos = $array5;

        $ofertas_activas = Oferta::all();

        $comprasMensuales = OrdenCompra::where('estado', 1)->get();

        $array6 = [];
        $anio_actual = date('Y');
        for ($i = 1; $i <= 12; $i++) {
            $array6[] = array("mes" => $i, "cantidad" => 0);
            foreach ($comprasMensuales as $compraMensual) {
                if ($compraMensual->created_at->month == $i && $compraMensual->created_at->year == $anio_actual) {
                    $array6[count($array6) - 1]["cantidad"]++;
                }
            }
        }

        $totalcomprasanual = 0;
        for ($i = 1; $i <= 12; $i++) {
            foreach ($comprasMensuales as $compraMensual) {
                if ($compraMensual->created_at->month == $i && $compraMensual->created_at->year == $anio_actual) {
                    $totalcomprasanual++;
                }
            }
        }

        for ($i = 0; $i < count($array6); $i++) {
            switch ($array6[$i]["mes"]) {
                case 1:
                    $array6[$i]["mes"] = "Enero";
                    break;
                case 2:
                    $array6[$i]["mes"] = "Febrero";
                    break;
                case 3:
                    $array6[$i]["mes"] = "Marzo";
                    break;
                case 4:
                    $array6[$i]["mes"] = "Abril";
                    break;
                case 5:
                    $array6[$i]["mes"] = "Mayo";
                    break;
                case 6:
                    $array6[$i]["mes"] = "Junio";
                    break;
                case 7:
                    $array6[$i]["mes"] = "Julio";
                    break;
                case 8:
                    $array6[$i]["mes"] = "Agosto";
                    break;
                case 9:
                    $array6[$i]["mes"] = "Septiembre";
                    break;
                case 10:
                    $array6[$i]["mes"] = "Octubre";
                    break;
                case 11:
                    $array6[$i]["mes"] = "Noviembre";
                    break;
                case 12:
                    $array6[$i]["mes"] = "Diciembre";
                    break;
            }
        }
        $visitas = Visitante::all();
        $añoactualvisita = date('Y');
        $array7 = [];
        for ($i = 1; $i <= 12; $i++) {
            $array7[] = array("mes" => $i, "cantidad" => 0);
            foreach ($visitas as $visita) {
                if ($visita->updated_at->month == $i && $visita->updated_at->year == $añoactualvisita) {
                    $array7[count($array7) - 1]["cantidad"]++;
                }
            }
        }

        $totalvisitasanual = 0;
        for ($i = 1; $i <= 12; $i++) {
            foreach ($visitas as $visita) {
                if ($visita->updated_at->month == $i && $visita->updated_at->year == $anio_actual) {
                    $totalvisitasanual++;
                }
            }
        }

        for ($i = 0; $i < count($array7); $i++) {
            switch ($array7[$i]["mes"]) {
                case 1:
                    $array7[$i]["mes"] = "Enero";
                    break;
                case 2:
                    $array7[$i]["mes"] = "Febrero";
                    break;
                case 3:
                    $array7[$i]["mes"] = "Marzo";
                    break;
                case 4:
                    $array7[$i]["mes"] = "Abril";
                    break;
                case 5:
                    $array7[$i]["mes"] = "Mayo";
                    break;
                case 6:
                    $array7[$i]["mes"] = "Junio";
                    break;
                case 7:
                    $array7[$i]["mes"] = "Julio";
                    break;
                case 8:
                    $array7[$i]["mes"] = "Agosto";
                    break;
                case 9:
                    $array7[$i]["mes"] = "Septiembre";
                    break;
                case 10:
                    $array7[$i]["mes"] = "Octubre";
                    break;
                case 11:
                    $array7[$i]["mes"] = "Noviembre";
                    break;
                case 12:
                    $array7[$i]["mes"] = "Diciembre";
                    break;
            }
        }
        $porRetirar = OrdenCompra::all();
        $porRetirar = OrdenCompra::where('estado', 1)->where('envio', 1)->where('estado_retiro', 0)->simplePaginate(4);
        //get the user of this compra and add name in porRetirar
        foreach ($porRetirar as $orden) {
            $user = User::find($orden->user_id);
            $metadata = UserMetadata::where('user_id', $orden->user_id)->first();
            if ($user && $metadata) {
                $user->metauser = $metadata;
                $user->metauser->comuna = Comuna::find($user->metauser->comuna_id);
                $user->metauser->comuna->nombre_comuna = $user->metauser->comuna->nombre_comuna;
                $orden->user = $user;
            }
        }

        $porEnviar = OrdenCompra::all();
        $porEnviar = OrdenCompra::where('estado', 1)->where('envio', 2)->where('estado_retiro', 0)->simplePaginate(4);

        foreach ($porEnviar as $orden) {
            $user = User::find($orden->user_id);
            $metadata = UserMetadata::where('user_id', $orden->user_id)->first();
            if ($user && $metadata) {
                $user->metauser = $metadata;
                $user->metauser->comuna = Comuna::find($user->metauser->comuna_id);
                $user->metauser->comuna->nombre_comuna = $user->metauser->comuna->nombre_comuna;
                $orden->user = $user;
            }
        }

        $ordenesCompra = OrdenCompra::where('estado', 1)->get();
        $añosVenta = $ordenesCompra->pluck('created_at')
            ->map(function ($fecha) {
                return $fecha->format('Y');
            })
            ->unique()
            ->sortDesc();
        $visita = Visitante::all();
        $añosVisita = $visita->pluck('created_at')->map(function ($fecha) {
            return $fecha->format('Y');
        })->unique()
        ->sortDesc();
        return view('back-office', compact('productos', 'array', 'ofertas', 'array2', 'orden', 'array6', 'array7', 'porEnviar', 'porRetirar', 'ordenesCompra', 'añosVenta', 'totalcomprasanual', 'anio_actual', 'añosVisita' , 'totalvisitasanual' , 'visita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ventasMensuales(Request $request)
    {
        return redirect()->route('ventasMensuales2', $request->año);
    }

    public function ventasMensualesMostrar($id)
    {
        $productos = Producto::select('nombre_producto', 'cantidad')->get();
        $categorias = Categoria::all();
        $array = [];
        foreach ($categorias as $categoria) {
            $categoria->productos = Producto::where('categoria_id', $categoria->id)->count();
            $array[] = $categoria;
        }
        $ofertas = Helpers::getOfertas();
        $array2 = [];
        $categorias2 = Categoria::all();
        foreach ($categorias2 as $categoria2) {
            $categoria2->productos = Producto::where('categoria_id', $categoria2->id);
            $categoria2->productos = $categoria2->productos->sum('cantidad');
            $array2[] = $categoria2;
        }
        $orden = OrdenCompra::where('estado', 1)->orderBy('created_at', 'desc');

        $vendidos = OrdenCompra::where('estado', 1)->get();
        $array3 = [];
        foreach ($productos as $producto) {
            $producto->cantidad = 0;
            foreach ($vendidos as $vendido) {
                foreach ($vendido->productos as $producto2) {
                    if ($producto->nombre_producto == $producto2->nombre_producto) {
                        $producto->cantidad += $producto2->pivot->cantidad_orden_compra;
                    }
                }
            }
            $array3[] = $producto;
        }

        $array4 = [];
        foreach ($array3 as $producto) {
            if ($producto->cantidad != 0) {
                $array4[] = $producto;
            }
        }

        $array5 = [];
        $i = 0;
        foreach ($array4 as $producto) {
            if ($i < 5) {
                $array5[] = $producto;
            }
            $i++;
        }
        $array5 = collect($array5)->sortByDesc('cantidad')->values()->all();
        $vendidos = $array5;

        $ofertas_activas = Oferta::all();

        $comprasMensuales = OrdenCompra::where('estado', 1)->get();


        $array6 = [];

        $encontrado = false;
        for ($i = 1; $i <= 12; $i++) {
            $array6[] = array("mes" => $i, "cantidad" => 0);
            foreach ($comprasMensuales as $compraMensual) {
                if ($compraMensual->created_at->month == $i && $compraMensual->created_at->year == $id) {
                    $array6[count($array6) - 1]["cantidad"]++;
                    $encontrado = true;
                }
            }
        }
        if (!$encontrado) {
            Alert::error('Error', 'El año ingresado no registra ninguna venta');
            return redirect()->route('backoffice');
        }


        $totalcomprasanual = 0;
        for ($i = 1; $i <= 12; $i++) {
            foreach ($comprasMensuales as $compraMensual) {
                if ($compraMensual->created_at->month == $i && $compraMensual->created_at->year == $id) {
                    $totalcomprasanual++;
                }
            }
        }
        for ($i = 0; $i < count($array6); $i++) {
            switch ($array6[$i]["mes"]) {
                case 1:
                    $array6[$i]["mes"] = "Enero";
                    break;
                case 2:
                    $array6[$i]["mes"] = "Febrero";
                    break;
                case 3:
                    $array6[$i]["mes"] = "Marzo";
                    break;
                case 4:
                    $array6[$i]["mes"] = "Abril";
                    break;
                case 5:
                    $array6[$i]["mes"] = "Mayo";
                    break;
                case 6:
                    $array6[$i]["mes"] = "Junio";
                    break;
                case 7:
                    $array6[$i]["mes"] = "Julio";
                    break;
                case 8:
                    $array6[$i]["mes"] = "Agosto";
                    break;
                case 9:
                    $array6[$i]["mes"] = "Septiembre";
                    break;
                case 10:
                    $array6[$i]["mes"] = "Octubre";
                    break;
                case 11:
                    $array6[$i]["mes"] = "Noviembre";
                    break;
                case 12:
                    $array6[$i]["mes"] = "Diciembre";
                    break;
            }
        }


        $visitas = Visitante::all();
        $añoactualvisita = date('Y');

        $array7 = [];
        for ($i = 1; $i <= 12; $i++) {
            $array7[] = array("mes" => $i, "cantidad" => 0);
            foreach ($visitas as $visita) {
                if ($visita->updated_at->month == $i && $visita->updated_at->year == $añoactualvisita) {
                    $array7[count($array7) - 1]["cantidad"]++;
                }
            }
        }

        $totalvisitasanual = 0;
        $anio_actual = date('Y');
        for ($i = 1; $i <= 12; $i++) {
            foreach ($visitas as $visita) {
                if ($visita->updated_at->month == $i && $visita->updated_at->year == $anio_actual) {
                    $totalvisitasanual++;
                }
            }
        }
        for ($i = 0; $i < count($array7); $i++) {
            switch ($array7[$i]["mes"]) {
                case 1:
                    $array7[$i]["mes"] = "Enero";
                    break;
                case 2:
                    $array7[$i]["mes"] = "Febrero";
                    break;
                case 3:
                    $array7[$i]["mes"] = "Marzo";
                    break;
                case 4:
                    $array7[$i]["mes"] = "Abril";
                    break;
                case 5:
                    $array7[$i]["mes"] = "Mayo";
                    break;
                case 6:
                    $array7[$i]["mes"] = "Junio";
                    break;
                case 7:
                    $array7[$i]["mes"] = "Julio";
                    break;
                case 8:
                    $array7[$i]["mes"] = "Agosto";
                    break;
                case 9:
                    $array7[$i]["mes"] = "Septiembre";
                    break;
                case 10:
                    $array7[$i]["mes"] = "Octubre";
                    break;
                case 11:
                    $array7[$i]["mes"] = "Noviembre";
                    break;
                case 12:
                    $array7[$i]["mes"] = "Diciembre";
                    break;
            }
        }

        $porRetirar = OrdenCompra::all();
        $porRetirar = OrdenCompra::where('estado', 1)->where('envio', 1)->where('estado_retiro', 0)->simplePaginate(4);
        //get the user of this compra and add name in porRetirar
        foreach ($porRetirar as $orden) {
            $user = User::find($orden->user_id);
            $metadata = UserMetadata::where('user_id', $orden->user_id)->first();
            if ($user && $metadata) {
                $user->metauser = $metadata;
                $user->metauser->comuna = Comuna::find($user->metauser->comuna_id);
                $user->metauser->comuna->nombre_comuna = $user->metauser->comuna->nombre_comuna;
                $orden->user = $user;
            }
        }

        $porEnviar = OrdenCompra::all();
        $porEnviar = OrdenCompra::where('estado', 1)->where('envio', 2)->where('estado_retiro', 0)->simplePaginate(4);

        foreach ($porEnviar as $orden) {
            $user = User::find($orden->user_id);
            $metadata = UserMetadata::where('user_id', $orden->user_id)->first();
            if ($user && $metadata) {
                $user->metauser = $metadata;
                $user->metauser->comuna = Comuna::find($user->metauser->comuna_id);
                $user->metauser->comuna->nombre_comuna = $user->metauser->comuna->nombre_comuna;
                $orden->user = $user;
            }
        }

        $ordenesCompra = OrdenCompra::where('estado', 1)->get();
        $añosVenta = $ordenesCompra->pluck('created_at')->map(function ($fecha) {
            return $fecha->format('Y');
        })->unique();

        $visita = Visitante::all();

        $añosVisita = $visita->pluck('created_at')->map(function ($fecha) {
            return $fecha->format('Y');
        })->unique()
        ->sortDesc();
        return view('back-office', compact('productos', 'array', 'ofertas', 'array2', 'orden', 'array6', 'array7', 'porEnviar', 'porRetirar', 'ordenesCompra', 'añosVenta', 'totalcomprasanual', 'añosVisita' , 'totalvisitasanual' , 'visita', 'id'));
    }

    public function visitasMensuales(Request $request)
    {
        return redirect()->route('visitasMensuales2', $request->año);
    }

    public function visitasMensualesMostrar($id)
    {
        $productos = Producto::select('nombre_producto', 'cantidad')->get();
        //count productos by categoria_id
        $categorias = Categoria::all();
        $array = [];
        foreach ($categorias as $categoria) {
            $categoria->productos = Producto::where('categoria_id', $categoria->id)->count();
            $array[] = $categoria;
        }
        $ofertas = Helpers::getOfertas();
        //count productos by cantidad order by categoria
        $array2 = [];
        $categorias2 = Categoria::all();
        foreach ($categorias2 as $categoria2) {
            $categoria2->productos = Producto::where('categoria_id', $categoria2->id);
            $categoria2->productos = $categoria2->productos->sum('cantidad');
            $array2[] = $categoria2;
        }
        $orden = OrdenCompra::where('estado', 1)->orderBy('created_at', 'desc');

        $vendidos = OrdenCompra::where('estado', 1)->get();
        //calcula las cantidades vendidas de cada producto siendo vendidas que aparezcan en la relacion entre orden compra y producto, orden compra con estado 1
        $array3 = [];
        foreach ($productos as $producto) {
            $producto->cantidad = 0;
            foreach ($vendidos as $vendido) {
                foreach ($vendido->productos as $producto2) {
                    if ($producto->nombre_producto == $producto2->nombre_producto) {
                        $producto->cantidad += $producto2->pivot->cantidad_orden_compra;
                    }
                }
            }
            $array3[] = $producto;
        }

        //filtrar de array 3 los productos con cantidad 0
        $array4 = [];
        foreach ($array3 as $producto) {
            if ($producto->cantidad != 0) {
                $array4[] = $producto;
            }
        }

        //ordenar de mayor a menor por cantidad y solo dame 5
        $array5 = [];
        $i = 0;
        foreach ($array4 as $producto) {
            if ($i < 5) {
                $array5[] = $producto;
            }
            $i++;
        }
        $array5 = collect($array5)->sortByDesc('cantidad')->values()->all();
        $vendidos = $array5;

        $ofertas_activas = Oferta::all();

        $comprasMensuales = OrdenCompra::where('estado', 1)->get();

        $array6 = [];
        $anio_actual = date('Y');
        for ($i = 1; $i <= 12; $i++) {
            $array6[] = array("mes" => $i, "cantidad" => 0);
            foreach ($comprasMensuales as $compraMensual) {
                if ($compraMensual->created_at->month == $i && $compraMensual->created_at->year == $anio_actual) {
                    $array6[count($array6) - 1]["cantidad"]++;
                }
            }
        }

        $totalcomprasanual = 0;
        for ($i = 1; $i <= 12; $i++) {
            foreach ($comprasMensuales as $compraMensual) {
                if ($compraMensual->created_at->month == $i && $compraMensual->created_at->year == $anio_actual) {
                    $totalcomprasanual++;
                }
            }
        }

        for ($i = 0; $i < count($array6); $i++) {
            switch ($array6[$i]["mes"]) {
                case 1:
                    $array6[$i]["mes"] = "Enero";
                    break;
                case 2:
                    $array6[$i]["mes"] = "Febrero";
                    break;
                case 3:
                    $array6[$i]["mes"] = "Marzo";
                    break;
                case 4:
                    $array6[$i]["mes"] = "Abril";
                    break;
                case 5:
                    $array6[$i]["mes"] = "Mayo";
                    break;
                case 6:
                    $array6[$i]["mes"] = "Junio";
                    break;
                case 7:
                    $array6[$i]["mes"] = "Julio";
                    break;
                case 8:
                    $array6[$i]["mes"] = "Agosto";
                    break;
                case 9:
                    $array6[$i]["mes"] = "Septiembre";
                    break;
                case 10:
                    $array6[$i]["mes"] = "Octubre";
                    break;
                case 11:
                    $array6[$i]["mes"] = "Noviembre";
                    break;
                case 12:
                    $array6[$i]["mes"] = "Diciembre";
                    break;
            }
        }
        $visitas = Visitante::all();
        $añoactualvisita = $id;
        $encontrado = false;
        for ($i = 1; $i <= 12; $i++) {
            $array6[] = array("mes" => $i, "cantidad" => 0);
            foreach ($comprasMensuales as $compraMensual) {
                if ($compraMensual->created_at->month == $i && $compraMensual->created_at->year == $id) {
                    $array6[count($array6) - 1]["cantidad"]++;
                    $encontrado = true;
                }
            }
        }
        if (!$encontrado) {
            Alert::error('Error', 'El año ingresado no registra ninguna visita');
            return redirect()->route('backoffice');
        }

        $totalvisitasanual = 0;
        for ($i = 1; $i <= 12; $i++) {
            foreach ($visitas as $visita) {
                if ($visita->updated_at->month == $i && $visita->updated_at->year == $anio_actual) {
                    $totalvisitasanual++;
                }
            }
        }

        for ($i = 0; $i < count($array7); $i++) {
            switch ($array7[$i]["mes"]) {
                case 1:
                    $array7[$i]["mes"] = "Enero";
                    break;
                case 2:
                    $array7[$i]["mes"] = "Febrero";
                    break;
                case 3:
                    $array7[$i]["mes"] = "Marzo";
                    break;
                case 4:
                    $array7[$i]["mes"] = "Abril";
                    break;
                case 5:
                    $array7[$i]["mes"] = "Mayo";
                    break;
                case 6:
                    $array7[$i]["mes"] = "Junio";
                    break;
                case 7:
                    $array7[$i]["mes"] = "Julio";
                    break;
                case 8:
                    $array7[$i]["mes"] = "Agosto";
                    break;
                case 9:
                    $array7[$i]["mes"] = "Septiembre";
                    break;
                case 10:
                    $array7[$i]["mes"] = "Octubre";
                    break;
                case 11:
                    $array7[$i]["mes"] = "Noviembre";
                    break;
                case 12:
                    $array7[$i]["mes"] = "Diciembre";
                    break;
            }
        }
        $porRetirar = OrdenCompra::all();
        $porRetirar = OrdenCompra::where('estado', 1)->where('envio', 1)->where('estado_retiro', 0)->simplePaginate(4);
        //get the user of this compra and add name in porRetirar
        foreach ($porRetirar as $orden) {
            $user = User::find($orden->user_id);
            $metadata = UserMetadata::where('user_id', $orden->user_id)->first();
            if ($user && $metadata) {
                $user->metauser = $metadata;
                $user->metauser->comuna = Comuna::find($user->metauser->comuna_id);
                $user->metauser->comuna->nombre_comuna = $user->metauser->comuna->nombre_comuna;
                $orden->user = $user;
            }
        }

        $porEnviar = OrdenCompra::all();
        $porEnviar = OrdenCompra::where('estado', 1)->where('envio', 2)->where('estado_retiro', 0)->simplePaginate(4);

        foreach ($porEnviar as $orden) {
            $user = User::find($orden->user_id);
            $metadata = UserMetadata::where('user_id', $orden->user_id)->first();
            if ($user && $metadata) {
                $user->metauser = $metadata;
                $user->metauser->comuna = Comuna::find($user->metauser->comuna_id);
                $user->metauser->comuna->nombre_comuna = $user->metauser->comuna->nombre_comuna;
                $orden->user = $user;
            }
        }

        $ordenesCompra = OrdenCompra::where('estado', 1)->get();
        $añosVenta = $ordenesCompra->pluck('created_at')
            ->map(function ($fecha) {
                return $fecha->format('Y');
            })
            ->unique()
            ->sortDesc();
        $visita = Visitante::all();
        $añosVisita = $visita->pluck('created_at')->map(function ($fecha) {
            return $fecha->format('Y');
        })->unique()
        ->sortDesc();
        $añoselect = $id;
        return view('back-office', compact('productos', 'array', 'ofertas', 'array2', 'orden', 'array6', 'array7', 'porEnviar', 'porRetirar', 'ordenesCompra', 'añosVenta', 'totalcomprasanual', 'anio_actual', 'añosVisita' , 'totalvisitasanual' , 'visita', 'añoselect'));
    }


}
