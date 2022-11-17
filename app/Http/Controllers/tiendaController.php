<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Comuna;
use App\Models\Producto;

class tiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $regiones = new Region;
        $regiones = Region::all();
        $comunas = new Comuna;
        $comunas = Comuna::all();
        $productos = new Producto;
        $productos = Producto::all();
        foreach($productos as $producto)
        {
            $producto->imagenes = explode('|', $producto->imagenes);
            
        }
        $ultimos = Producto::latest()->take(6)->get();
        foreach($ultimos as $ultimo)
        {
            $ultimo->imagenes = explode('|', $ultimo->imagenes);
            $ultimo->imagenes = $ultimo->imagenes[0];
        }

        
        return view('tienda', compact('regiones', 'comunas', 'productos' , 'ultimos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
