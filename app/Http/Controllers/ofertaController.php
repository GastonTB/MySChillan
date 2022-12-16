<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;


class ofertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $productos = Producto::where('oferta_id','!=',0)->with('oferta')->latest()->paginate(10);
        foreach($productos as $producto){
            $producto->precio = number_format($producto->precio, 0, ",", ".");
            $producto->oferta->precio_oferta = number_format($producto->oferta->precio_oferta, 0, ",", ".");
        }
        return view('ofertas.index', compact('productos'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // return $request;
        $id = $request->id_producto;
        $producto = Producto::findOrFail($id);
        $nombre_producto = $producto->nombre_producto;
        $oferta = $request->oferta;
        //remove dollar
        $oferta = str_replace("$", "", $oferta);
        //remove dot
        $oferta = str_replace(".", "", $oferta);
        //to int
        $oferta = (int)$oferta;
        //merge with request oferta
        $request->merge(['oferta' => $oferta]);
        $precio_antiguo_hidden = str_replace("$", "", $request->precio_antiguo_hidden);
        $precio_antiguo_hidden = str_replace(".", "", $precio_antiguo_hidden);
        $precio_antiguo_hidden = (int)$precio_antiguo_hidden;
        $request->merge(['precio_antiguo_hidden' => $precio_antiguo_hidden]);
        // if($request->precio_antiguo_hidden<$request->oferta){
        //     return Redirect::back()
        //     ->with('message', 'error-oferta')
        //     ->with('nombre', $nombre_producto)
        //     ->with('precio_antiguo' , number_format($producto->precio, 0, ",", "."))
        //     ->with('id_producto', $id)
        //     ->with('precio_antiguo_hidden', $request->precio_antiguo_hidden);
        // }


        $reglas = array(
            'oferta' => 'required || integer || min:100 || lt:precio_antiguo_hidden',
            'fecha_ini' => 'required || date_format:y-m-d',
            'fecha_ter' => 'required || date_format:y-m-d',
        );

        $mensajes = array(
            'oferta.required' => 'El campo oferta es obligatorio',
            'oferta.integer' => 'El campo oferta debe ser un numero',
            'oferta.lt' => 'El campo oferta debe tener como maximo el valor del campo Precio Producto',
            'oferta.min' => 'El campo oferta debe tener como minimo el valor de $100',
            'fecha_ini.required' => 'El campo fecha de inicio es obligatorio',
            'fecha_ini.date_format' => 'El campo fecha de inicio debe tener el formato aaaa-mm-dd',
            'fecha_ter.required' => 'El campo fecha de termino es obligatorio',
            'fecha_ter.date_format' => 'El campo fecha de termino debe tener el formato aaaa-mm-dd',
        );

        $validador = Validator::make($request->all(), $reglas, $mensajes);

        // $precio_antiguo = number_format($producto->precio, 0, ",", ".");
        // $oferta = number_format($request->oferta, 0, ",", ".");
        // $oferta = "$".$oferta;

        
     
        $hoy = date("Y-m-d");
        $fecha_ini = $request->fecha_ini;
        $fecha_ter = $request->fecha_ter;

        //convert fecha_ini to date y-m-d
        $fecha_ini = str_replace("/", "-", $fecha_ini);
        $fecha_ini = date("Y-m-d", strtotime($fecha_ini));
        //convert fecha_ter to date y-m-d
        $fecha_ter = str_replace("/", "-", $fecha_ter);
        $fecha_ter = date("Y-m-d", strtotime($fecha_ter));
        
        // if($fecha_ini < $hoy && $fecha_ter < $hoy){
        //     return Redirect::back()
        //     ->with('message', 'error-oferta')
        //     ->with('nombre', $nombre_producto)
        //     ->with('precio_antiguo' , number_format($producto->precio, 0, ",", "."))
        //     ->with('id_producto', $id)
        //     ->with('precio_antiguo_hidden', $request->precio_antiguo_hidden)
        //     ->with('error_fi', 'La fecha de inicio no puede ser menor a la fecha actual')
        //     ->with('error_ft', 'La fecha de termino no puede ser menor a la fecha actual');
        // }

        // if($fecha_ini <  $hoy){
        //     return Redirect::back()
        //     ->with('message', 'error-oferta')
        //     ->with('nombre', $nombre_producto)
        //     ->with('precio_antiguo' , number_format($producto->precio, 0, ",", "."))
        //     ->with('id_producto', $id)
        //     ->with('precio_antiguo_hidden', $request->precio_antiguo_hidden)
        //     ->with('error_fi', 'La fecha de inicio no puede ser menor a la fecha actual');
        // }

        // if($fecha_ter <  $hoy){
        //     return Redirect::back()
        //     ->with('message', 'error-oferta')
        //     ->with('nombre', $nombre_producto)
        //     ->with('precio_antiguo' , number_format($producto->precio, 0, ",", "."))
        //     ->with('id_producto', $id)
        //     ->with('precio_antiguo_hidden', $request->precio_antiguo_hidden)
        //     ->with('error_ft', 'La fecha de termino no puede ser menor a la fecha actual');
        // }


        if($fecha_ini >= $fecha_ter){
            return Redirect::back()
            ->with('message', 'error-oferta')
            ->with('nombre', $nombre_producto)
            ->with('precio_antiguo' , number_format($producto->precio, 0, ",", "."))
            ->with('id_producto', $id)
            ->with('precio_antiguo_hidden', $request->precio_antiguo_hidden)
            ->with('error_ft', 'La fecha de inicio no puede ser mayor o igual a la fecha de termino');
        }

        if($validador->fails()){
            return Redirect::back()
            ->with('message', 'error-oferta')
            ->with('nombre', $nombre_producto)
            ->with('precio_antiguo' , number_format($producto->precio, 0, ",", "."))
            ->with('id_producto', $id)
            ->with('precio_antiguo_hidden', $request->precio_antiguo_hidden)
            ->withErrors($validador);
        }
        

        if($fecha_ini ==  $hoy  && $fecha_ter >  $hoy){
            $oferta = Oferta::create(
                [
                    'fecha_inicio'  => $request->fecha_ini,
                    'fecha_fin' => $request->fecha_ter,
                    'precio_oferta' => $oferta,
                    'estado_oferta' => 1,
                ]
            );
        }

        if($fecha_ini > $hoy && $fecha_ter > $hoy){
            $oferta = Oferta::create(
                [
                    'fecha_inicio'  => $request->fecha_ini,
                    'fecha_fin' => $request->fecha_ter,
                    'precio_oferta' => $oferta,
                    'estado_oferta' => 0,
                ]
            );
        }

        $producto->oferta_id = $oferta->id;
        $producto->save();
        Alert::success('Oferta Creada de Forma Exitosa', 'El nuevo precio sera visible para los clientes');
        return redirect()->back();

                
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
        $oferta = Oferta::findOrfail($id);
        $producto = Producto::where('oferta_id', $id)->first();
        if($request->precio_oferta_oculto == null){
            $precio = $oferta->precio_oferta;
            //merge with request
            $request->merge(['precio_oferta_oculto' => $precio]);
            if($request->precio_oferta_oculto > $producto->precio){
                $precio_oferta = $request->precio_oferta_oculto;
                $precio_oferta = number_format($precio_oferta, 0, ",", ".");
                //add dollar
                $precio_oferta = "$" . $precio_oferta;
                return Redirect::back()
                ->with('message', 'error-oferta-editar')
                ->with('nombre', $producto->nombre_producto)
                ->with('precio_antiguo' , number_format($producto->precio, 0, ",", "."))
                ->with('precio_oferta', $precio_oferta)
                ->with('fecha_ini', $oferta->fecha_inicio)
                ->with('fecha_ter', $oferta->fecha_fin)
                ->with('id_producto', $id)
                ->with('id_oferta', $oferta->id)
                ->with('precio_antiguo_hidden', $request->precio_antiguo_hidden)
                ->with('error_oferta', 'El precio de la oferta no puede ser mayor o igual al precio del producto');
            }
        }else{
            $precio_oferta = $request->precio_oferta_oculto;
            //remove dot
            $precio_oferta = str_replace(".", "", $precio_oferta);
            //remove dollar
            $precio_oferta = str_replace("$", "", $precio_oferta);
            //int
            $precio_oferta = (int)$precio_oferta;
            //merge with request
            $request->merge(['precio_oferta_oculto' => $precio_oferta]);
            if($request->precio_oferta_oculto >= $producto->precio){
                $precio_oferta = $request->precio_oferta_oculto;
                $precio_oferta = number_format($precio_oferta, 0, ",", ".");
                //add dollar
                $precio_oferta = "$" . $precio_oferta;
                return Redirect::back()
                ->with('message', 'error-oferta-editar')
                ->with('nombre', $producto->nombre_producto)
                ->with('precio_antiguo' , number_format($producto->precio, 0, ",", "."))
                ->with('precio_oferta', $precio_oferta)
                ->with('fecha_ini', $oferta->fecha_inicio)
                ->with('fecha_ter', $oferta->fecha_fin)
                ->with('id_producto', $id)
                ->with('id_oferta', $oferta->id)
                ->with('precio_antiguo_hidden', $request->precio_antiguo_hidden)
                ->with('error_oferta', 'El precio de la oferta no puede ser mayor o igual al precio del producto');
            }
        }
        if($request->fecha_ini_oculto == null){
            $fecha_ini = $oferta->fecha_inicio;
            //merge with request
            $request->merge(['fecha_ini_oculto' => $fecha_ini]);
        }
        if($request->fecha_ter_oculto == null){
            $fecha_ter = $oferta->fecha_fin;
            //merge with request
            $request->merge(['fecha_ter_oculto' => $fecha_ter]);
        }

        //fecha_ini to date
        $fecha_ini = date_create($request->fecha_ini_oculto);
        //fecha_ter to date
        $fecha_ter = date_create($request->fecha_ter_oculto);
        //merge
        //format date to y-m-d
        $fecha_ini = date_format($fecha_ini, 'y-m-d');
        $fecha_ter = date_format($fecha_ter, 'y-m-d');
        $request->merge(['fecha_ini_oculto' => $fecha_ini]);
        $request->merge(['fecha_ter_oculto' => $fecha_ter]);
        

        $reglas = array(
            'precio_oferta_oculto' => 'integer || min:100 || max:99999',
            'fecha_ini_oculto' => 'date_format:y-m-d',
            'fecha_ter_oculto' => 'date_format:y-m-d',
        );


        $nombre_producto = $producto->nombre_producto;
        $precio_oferta = $request->precio_oferta_oculto;
        $precio_oferta = number_format($precio_oferta, 0, ",", ".");
        //add dollar
        $precio_oferta = "$" . $precio_oferta;

        //transform fecha_ini_oculto to date
        $fecha_ini = date_create($request->fecha_ini_oculto);
        $fecha_ini = date_format($fecha_ini, 'Y-m-d');


        //if fecha ini is less than today
        $hoy = date('Y-m-d');
        if($fecha_ini < $hoy){
            return Redirect::back()
            ->with('message', 'error-oferta-editar')
            ->with('nombre', $nombre_producto)
            ->with('precio_antiguo' , number_format($producto->precio, 0, ",", "."))
            ->with('precio_oferta', $precio_oferta)
            ->with('fecha_ini', $oferta->fecha_inicio)
            ->with('fecha_ter', $oferta->fecha_fin)
            ->with('id_producto', $id)
            ->with('id_oferta', $oferta->id)
            ->with('precio_antiguo_hidden', $request->precio_antiguo_hidden)
            ->with('error_fi', 'La fecha de inicio no puede ser menor a la fecha actual');
        }

        //transform fecha_ter_oculto to date
        $fecha_ter = date_create($request->fecha_ter_oculto);
        $fecha_ter = date_format($fecha_ter, 'Y-m-d');
        //if fecha ini is less than today
        if($fecha_ter < $hoy){
            return Redirect::back()
            ->with('message', 'error-oferta-editar')
            ->with('nombre', $nombre_producto)
            ->with('precio_antiguo' , number_format($producto->precio, 0, ",", "."))
            ->with('precio_oferta', $precio_oferta)
            ->with('fecha_ini', $oferta->fecha_inicio)
            ->with('fecha_ter', $oferta->fecha_fin)
            ->with('id_producto', $id)
            ->with('id_oferta', $oferta->id)
            ->with('precio_antiguo_hidden', $request->precio_antiguo_hidden)
            ->with('error_ft', 'La fecha de termino no puede ser menor a la fecha actual');
        }

        //if fecha ini is greater than fecha ter
        if($fecha_ini > $fecha_ter){
            return Redirect::back()
            ->with('message', 'error-oferta-editar')
            ->with('nombre', $nombre_producto)
            ->with('precio_antiguo' , number_format($producto->precio, 0, ",", "."))
            ->with('precio_oferta', $precio_oferta)
            ->with('fecha_ini', $oferta->fecha_inicio)
            ->with('fecha_ter', $oferta->fecha_fin)
            ->with('id_producto', $id)
            ->with('id_oferta', $oferta->id)
            ->with('precio_antiguo_hidden', $request->precio_antiguo_hidden)
            ->with('error_ft', 'La fecha de inicio no puede ser mayor a la fecha de termino');
        }


        $mensajes = array(
            'precio_oferta_oculto.integer' => 'El precio de la oferta debe ser un numero entero',
            'precio_oferta_oculto.min' => 'El precio de la oferta debe ser mayor a 100',
            'precio_oferta_oculto.max' => 'El precio de la oferta debe ser menor a 99999',
            'fecha_ini_oculto.date_format' => 'La fecha de inicio debe tener el formato yyyy-mm-dd',
            'fecha_ter_oculto.date_format' => 'La fecha de termino debe tener el formato yyyy-mm-dd',
        );
        
        $validator = Validator::make($request->all(), $reglas, $mensajes);
        if ($validator->fails()) {
            return Redirect::back()
            ->with('message', 'error-oferta-editar')
            ->with('nombre', $nombre_producto)
            ->with('precio_antiguo' , number_format($producto->precio, 0, ",", "."))
            ->with('precio_oferta', $oferta->precio_oferta)
            ->with('fecha_ini', $oferta->fecha_inicio)
            ->with('fecha_ter', $oferta->fecha_fin)
            ->with('id_producto', $id)
            ->with('id_oferta', $oferta->id)
            ->with('precio_antiguo_hidden', $request->precio_antiguo_hidden)
            ->withErrors($validator);

        }

        if($request->precio_oferta_oculto != null){
            $oferta->precio_oferta = $request->precio_oferta_oculto;
        }
        if($request->fecha_ini_oculto != null){
            $oferta->fecha_inicio = $request->fecha_ini_oculto;
        }
        if($request->fecha_ter_oculto != null){
            $oferta->fecha_fin = $request->fecha_ter_oculto;
        }
        if($request->fecha_ini_oculto >= $hoy && $request->fecha_ter_oculto > $hoy){
            $oferta->estado_oferta = '1';
        }
        $oferta->save();
        Alert::success('Oferta Editada de Forma Exitosa', 'El precio del producto se ha actualizado');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $oferta = Oferta::findOrFail($id);
        $producto = Producto::where('oferta_id', $id)->first();
        $producto->oferta_id = null;
        $producto->save();
        $oferta->delete();
        Alert::success('Oferta Eliminada de Forma Exitosa', 'El precio del producto se ha restablecido');
        return redirect()->back();
    }
}
