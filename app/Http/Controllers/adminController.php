<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Producto;
use App\Models\Oferta;
use App\Models\Categoria;
use App\Helpers\Helpers;


class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //select nombre y cantidad from producto
        $productos = Producto::select('nombre_producto', 'cantidad')->get();
        //count productos by categoria_id
        $categorias = Categoria::all();
        $array = [];
        foreach($categorias as $categoria){
            $categoria->productos = Producto::where('categoria_id', $categoria->id)->count();
            $array[] = $categoria;
        }
        $ofertas = Helpers::getOfertas();
        //count productos by cantidad order by categoria
        $array2 = [];
        $categorias2 = Categoria::all();
        foreach($categorias2 as $categoria2){
            $categoria2->productos = Producto::where('categoria_id', $categoria2->id);
            $categoria2->productos = $categoria2->productos->sum('cantidad');
            $array2[] = $categoria2;
        }
        return view('back-office' , compact('productos', 'array', 'ofertas', 'array2'));
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
}
