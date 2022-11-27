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
        //
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
         $producto = Producto::findOrFail($request->id_producto);
         $nombre_producto = $producto->nombre_producto;
         $precio_antiguo = number_format($producto->precio, 0, ",", ".");
         $id = $producto->id;

        $reglas = array(
            'oferta' => 'required || max:8 || min:4',
            'fecha_ini' => 'required || date_format:y-m-d',
            'fecha_ter' => 'required || date_format:y-m-d'
        );

        $validador = Validator::make($request->all(), $reglas);

        if($validador->fails()){
            return Redirect::back()
            ->with('message', 'error-oferta')
            ->with('nombre', $nombre_producto)
            ->with('precio_antiguo' , $precio_antiguo)
            ->with('id_producto', $id)
            ->withErrors($validador);
        }
        
        $oferta = str_replace('$','',$request->oferta);
        $oferta = str_replace('.','',$oferta);

        $oferta = Oferta::create(
            [
                'fecha_inicio'  => $request->fecha_ini,
                'fecha_fin' => $request->fecha_ter,
                'precio_oferta' => $oferta,
                'estado_oferta' => 1,
            ]
        );

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
}