<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Comuna;
use App\Models\Producto;
use App\Models\Oferta;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrito;
use Illuminate\Support\Collection;
//carbon
use Carbon\Carbon;


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
        $productos = Producto::latest()->get();
        $categoria = 0;
        foreach($productos as $producto)
        {
            $producto->imagenes = explode('|', $producto->imagenes);

        }

        $ultimos = Producto::latest()->take(7)->get();
        foreach($ultimos as $ultimo)
        {
            $ultimo->imagenes = explode('|', $ultimo->imagenes);
            $ultimo->imagenes = $ultimo->imagenes[0];
        }

        $ofertas = Producto::where('oferta_id', '!=','0')->latest()->take(7)->get();


        foreach($ofertas as $oferta)
        {
            $oferta->imagenes = explode('|', $oferta->imagenes);
            $oferta->imagenes = $oferta->imagenes[0];
        }
        
        return view('tienda', compact('productos' , 'ultimos', 'ofertas', 'categoria'));
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

    public function filtrar(Request $request)
{
        
        $reglas = array(
            'categorias' => 'required || max:1 || min:1',
        );

        $validador = Validator::make($request->all(), $reglas);
        if($validador->fails()){
            return Redirect::back()
            ->withErrors($validador);
        }
        
        $categoria = $request->categorias;
        $categoria = implode(',', $categoria);

        if($categoria == 9){
            $categoria = 9;
            $titulo =  'TIENDA';
            $productos = Producto::all();
        }else{
            $categoria = Categoria::findOrFail($request->categorias)->first();
            $titulo = $categoria->nombre_categoria;
            $categoria = $categoria->id;
        }

        $regiones = new Region;
        $regiones = Region::all();
        $comunas = new Comuna;
        $comunas = Comuna::all();
        $productos = new Producto;

        if($categoria == 9)
        {
            $productos = Producto::all();
        }else{
            $productos = Producto::where('categoria_id', $categoria)->get();
        }

        foreach($productos as $producto)
        {
            $producto->imagenes = explode('|', $producto->imagenes);
            if($producto->oferta_id != 0){
                $producto->precio = $producto->oferta->precio_oferta;
            }

        }


        $ofertas = Producto::where('oferta_id', '!=','0')->latest()->take(7)->get();

        foreach($ofertas as $oferta)
        {
            $oferta->imagenes = explode('|', $oferta->imagenes);
            $oferta->imagenes = $oferta->imagenes[0];
        }
        $ultimos = Producto::latest()->take(7)->get();
        foreach($ultimos as $ultimo)
        {
            $ultimo->imagenes = explode('|', $ultimo->imagenes);
            $ultimo->imagenes = $ultimo->imagenes[0];
        }

        return view('tienda', compact('productos', 'regiones', 'comunas', 'ultimos', 'ofertas', 'categoria', 'titulo'));

    }

    public function filtrados($categoria)
    {   

        $categoria = Categoria::findOrFail($categoria);
        $titulo = $categoria->nombre_categoria;
        $categoria = $categoria->id;

        $regiones = new Region;
        $regiones = Region::all();
        $comunas = new Comuna;
        $comunas = Comuna::all();
        $productos = Producto::where('categoria_id', $categoria)->get();
        $ofertas = Producto::join('ofertas','ofertas.id','productos.oferta_id')->
        where('productos.oferta_id', '!=','0')->
        where('ofertas.estado_oferta', '!=', '0')->
        orderBy('oferta_id', 'desc')->
        take(7)->get();

        foreach($ofertas as $oferta)
        {
            $oferta->imagenes = explode('|', $oferta->imagenes);
            $oferta->imagenes = $oferta->imagenes[0];
        }
        $ultimos = Producto::latest()->take(7)->get();
        foreach($ultimos as $ultimo)
        {
            $ultimo->imagenes = explode('|', $ultimo->imagenes);
            $ultimo->imagenes = $ultimo->imagenes[0];
        }

        foreach($productos as $producto)
        {
            $producto->imagenes = explode('|', $producto->imagenes);
            if($producto->oferta_id != 0){
                $producto->precio = $producto->oferta->precio_oferta;
            }

        }

        return view('tienda', compact('productos', 'categoria', 'ofertas', 'ultimos', 'titulo'));

    }

}
