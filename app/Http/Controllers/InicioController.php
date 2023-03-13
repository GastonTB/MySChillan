<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Comuna;
use App\Models\Producto;
use App\Models\Carrito;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helpers;



class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $ultimos = Helpers::getUltimos();
 
        // $ofertas = Producto::where('oferta_id', '!=','0')->latest()->take(7)->get();
        $ofertas = Helpers::getOfertas();

        $calificados = Helpers::getCalificados();
        
        // foreach($ofertas as $oferta)
        // {
        //     $oferta->imagenes = explode('|', $oferta->imagenes);
        //     $oferta->imagenes = $oferta->imagenes[0];
        // }
        return view('inicio', compact('ultimos' , 'ofertas', 'calificados'));
        
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

    public function nosotros()
    {
        return view('nosotros');
    }
}
