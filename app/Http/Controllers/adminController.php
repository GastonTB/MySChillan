<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Producto;
use App\Models\Oferta;
use App\Models\Categoria;
use App\Helpers\Helpers;
use App\Models\OrdenCompra;


class adminController extends Controller
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
        $orden = OrdenCompra::where('estado', 1)->orderBy('created_at', 'desc')->paginate(4);
        
        $vendidos = OrdenCompra::where('estado', 1)->get();
        //calcula las cantidades vendidas de cada producto siendo vendidas que aparezcan en la relacion entre orden compra y producto, orden compra con estado 1
        $array3 = [];
        foreach($productos as $producto){
            $producto->cantidad = 0;
            foreach($vendidos as $vendido){
                foreach($vendido->productos as $producto2){
                    if($producto->nombre_producto == $producto2->nombre_producto){
                        $producto->cantidad += $producto2->pivot->cantidad_orden_compra;
                    }
                }
            }
            $array3[] = $producto;
        }

        //filtrar de array 3 los productos con cantidad 0
        $array4 = [];
        foreach($array3 as $producto){
            if($producto->cantidad != 0){
                $array4[] = $producto;
            }
        }

        //ordenar de mayor a menor por cantidad y solo dame 5
        $array5 = [];
        $i = 0;
        foreach($array4 as $producto){
            if($i < 5){
                $array5[] = $producto;
            }
            $i++;
        }
        $array5 = collect($array5)->sortByDesc('cantidad')->values()->all();
        $vendidos = $array5;
        
        $ofertas_activas = Oferta::all();
        
        
        return view('back-office' , compact('productos', 'array', 'ofertas', 'array2', 'orden'));
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
