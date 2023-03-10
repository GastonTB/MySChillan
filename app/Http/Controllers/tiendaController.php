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
use Carbon\Carbon;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\DB;



class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('filtrados', ['id' => 9, 'minimo' => 0, 'maximo' => 100000, 'nombre' => 999, 'orden' => 1]);
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
            'categoria' => 'max:1',
            'minimo' => 'required | integer | max:100000 | min:0',
            'maximo' => 'required | integer | max:100000 | min:0',
            'ordenar' => 'required | integer | min:1| max:8',
        );

        $mensaje = array(
            'categoria.max' => 'Solo se puede seleccionar una categoria',
            'minimo.required' => 'El campo precio minimo es obligatorio',
            'minimo.integer' => 'Precio minimo invalido',
            'minimo.max' => 'El campo precio minimo debe ser menor a $100.000',
            'minimo.min' => 'El campo precio minimo debe ser mayor a $0',
            'maximo.required' => 'El campo precio maximo es obligatorio',
            'maximo.integer' => 'Precio maximo invalido',
            'maximo.max' => 'El campo precio maximo debe ser menor a $100.000',
            'maximo.min' => 'El campo precio maximo debe ser mayor a $0',
            'ordenar.required' => 'El campo ordenar es obligatorio',
            'ordenar.integer' => 'Orden invalido',
            'ordenar.min' => 'Orden invalido',
            'ordenar.max' => 'Orden invalido',
        );


        $validador = Validator::make($request->all(), $reglas, $mensaje);
        if ($validador->fails()) {
            return Redirect::back()
                ->withErrors($validador)->withInput();
        }

        if ($request->has('categoria')) {
            $categorias = implode(',', $request->categoria);
            if ($categorias == 9) {
                $categoria = 9;
                $titulo = 'TIENDA';
            } else {
                $categoria = Categoria::findOrFail($categorias);
                $titulo = $categoria->nombre_categoria;
                $categoria = $categoria->id;
            }
        } else {
            $categoria = 9;
            $titulo =  'TIENDA';
        }

        $orden = $request->ordenar;

        $ordenar = $request->ordenar;
        $minimo = $request->minimo;
        $maximo = $request->maximo;
        $nombre = $request->nombre_busqueda;
        if ($nombre == null) {
            $nombre = 999;
        }
        // return view('tienda', compact('productos', 'ultimos', 'ofertas', 'categoria', 'titulo' ,'minimo', 'maximo'));

        return redirect()->route('filtrados', array('id' => $categoria, 'minimo' => $minimo, 'maximo' => $maximo, 'nombre' => $nombre, 'orden' => $orden));
    }

    public function filtrados($categoria, $minimo, $maximo, $orden, $nombre)
    {
        if ($nombre == 999) {
            $nombre = '';
        }
        if (!is_numeric($minimo)) {
            $minimo = 0;
        }
        if (!is_numeric($maximo)) {
            $maximo = 100000;
        }
        if ($minimo > $maximo) {
            $minimo = 0;
            $maximo = 100000;
        }
        if ($minimo < 0) {
            $minimo = 0;
        }
        if ($maximo > 100000) {
            $maximo = 100000;
        }
        if ($categoria > 9 || $categoria < 1) {
            $categoria = 9;
            $titulo = 'TIENDA';
        } elseif ($categoria < 9) {
            $categoria = Categoria::findOrFail($categoria);
            $titulo = $categoria->nombre_categoria;
            $categoria = $categoria->id;
        } else {
            $categoria = 9;
            $titulo = 'TIENDA';
        }

        if (!$nombre || $nombre == '') {
            if ($categoria != 9) {
                $productos = Producto::where('categoria_id', $categoria)->where('precio', '>=', $minimo)->latest()->where('precio', '<=', $maximo)->latest();
            } else {
                $productos = Producto::where('precio', '>=', $minimo)->where('precio', '<=', $maximo)->latest();
            }
        } else {
            if ($categoria != 9) {
                $productos = Producto::where('categoria_id', $categoria)->where('precio', '>=', $minimo)->where('precio', '<=', $maximo)->where('nombre_producto', 'like', '%' . $nombre . '%')->latest();
            } else {
                $productos = Producto::where('precio', '>=', $minimo)->where('precio', '<=', $maximo)->where('nombre_producto', 'like', '%' . $nombre . '%')->latest();
            }
        }
        
        foreach ($productos as $producto) {
            $promedio = $producto->getPromedio();
            if ($promedio == null ){
                $promedio = 0;
            }
            $producto->promedio_calificaciones = $promedio;
        }

        
        switch ($orden) {
            case 1:
                $productos = $productos->orderBy('created_at', 'desc')->paginate(12);
                break;
            case 2:
                $productos = $productos->orderBy('created_at', 'asc')->paginate(12);
                break;
            case 3:
                $productos = $productos->orderBy('precio', 'desc')->paginate(12);
                break;
            case 4:
                $productos = $productos->orderBy('precio', 'asc')->paginate(12);
                break;
            case 5:
                $productos = $productos->orderBy('nombre_producto', 'asc')->paginate(12);
                break;
            case 6:
                $productos = $productos->orderBy('nombre_producto', 'desc')->paginate(12);
                break;
            case 7:
                $productos = Producto::leftJoin('calificaciones', 'productos.id', '=', 'calificaciones.producto_id')
                      ->selectRaw('productos.*, AVG(calificaciones.puntuacion) AS promedio_calificaciones')
                      ->groupBy('productos.id', 'productos.nombre_producto', 'productos.cantidad', 'productos.precio','productos.descripcion','productos.imagenes','productos.created_at' , 'productos.updated_at','categoria_id','oferta_id','deleted_at')
                      ->orderBy('promedio_calificaciones', 'desc')
                      ->paginate(12);
                break;
            case 8:
                $productos = Producto::leftJoin('calificaciones', 'productos.id', '=', 'calificaciones.producto_id')
                      ->selectRaw('productos.*, AVG(calificaciones.puntuacion) AS promedio_calificaciones')
                      ->groupBy('productos.id', 'productos.nombre_producto', 'productos.cantidad', 'productos.precio','productos.descripcion','productos.imagenes','productos.created_at' , 'productos.updated_at','categoria_id','oferta_id','deleted_at')
                      ->orderBy('promedio_calificaciones', 'asc')
                      ->paginate(12);
                      break;
            default:
                $productos = $productos->orderBy('created_at', 'desc')->paginate(12);
                break;
        }   
       
        // switch ($orden) {
        //     case 1:
        //         $ordenar1 = 'created_at';
        //         $ordenar2 = 'desc';
        //         break;
        //     case 2:
        //         $ordenar1 = 'created_at';
        //         $ordenar2 = 'asc';
        //         break;
        //     case 3:
        //         $ordenar1 = 'precio';
        //         $ordenar2 = 'desc';
        //         break;
        //     case 4:
        //         $ordenar1 = 'precio';
        //         $ordenar2 = 'asc';
        //         break;
        //     case 5:
        //         $ordenar1 = 'nombre_producto';
        //         $ordenar2 = 'asc';
        //         break;
        //     case 6:
        //         $ordenar1 = 'nombre_producto';
        //         $ordenar2 = 'desc';
        //         break;
        //     case 7:
        //         $ordenar1 = 'promedio_califiaciones';
        //         $ordenar2 = 'desc';
        //         break;
        //     case 8:
        //         $ordenar1 = 'promedio_califiaciones';
        //         $ordenar2 = 'desc';
        //         break;
        //     default:
        //         $ordenar1 = 'created_at';
        //         $ordenar2 = 'desc';
        //         break;
        // }

        

        // if (!$nombre || $nombre == '') {
        //     if ($categoria != 9) {
        //         $productos = Producto::where('categoria_id', $categoria)->where('precio', '>=', $minimo)->latest()->where('precio', '<=', $maximo)->latest()->paginate(12);
        //     } else {
        //         $productos = Producto::all();
        //         $productos = Producto::where('precio', '>=', $minimo)->where('precio', '<=', $maximo)->latest()->paginate(12);
        //     }
        // } else {
        //     if ($categoria != 9) {
        //         $productos = Producto::where('categoria_id', $categoria)->where('precio', '>=', $minimo)->where('precio', '<=', $maximo)->where('nombre_producto', 'like', '%' . $nombre . '%')->latest()->paginate(12);
        //     } else {
        //         $productos = Producto::where('precio', '>=', $minimo)->where('precio', '<=', $maximo)->where('nombre_producto', 'like', '%' . $nombre . '%')->latest()->paginate(12);
        //     }
        // }
        
        
        // foreach ($productos as $producto) {
        //     $promedio = $producto->getPromedio();
        //     $producto->promedio_calificaciones = $promedio;
        // }
        


        $buscar = $nombre;
        $ofertas = Helpers::getOfertas();
        $ultimos = Helpers::getUltimos();
        $calificados = Helpers::getCalificados();

        foreach ($productos as $producto) {
            $producto->imagenes = explode('|', $producto->imagenes);
        }

        return view('tienda', compact('productos', 'categoria', 'ofertas', 'ultimos', 'titulo', 'minimo', 'maximo', 'buscar', 'orden', 'calificados'));
    }

    public function buscar(Request $request)
    {

        $buscar = $request->buscar;
        if ($buscar == NULL) {
            return redirect()->route('tienda');
        }

        return redirect()->route('buscados', array('nombre' => $buscar));
    }

    public function buscados($buscar)
    {

        $productos = Producto::where('nombre_producto', 'like', '%' . $buscar . '%')->paginate(12);
        $minimo = 0;
        $maximo = 100000;
        $categoria = 9;
        $titulo = 'TIENDA';

        $orden = 1;

        if ($categoria != 9) {
            $productos = Producto::where('categoria_id', $categoria)->where('nombre_producto', 'like', '%' . $buscar . '%')->where('precio', '>=', $minimo)->latest()->where('precio', '<=', $maximo)->latest()->paginate(12);
        } else {
            $productos = Producto::where('precio', '>=', $minimo)->where('nombre_producto', 'like', '%' . $buscar . '%')->where('precio', '<=', $maximo)->latest()->paginate(12);
        }


        $ofertas = Helpers::getOfertas();
        $ultimos = Helpers::getUltimos();
        $calificados = Helpers::getCalificados();

        foreach ($productos as $producto) {
            $producto->imagenes = explode('|', $producto->imagenes);
        }


        return view('tienda', compact('productos', 'categoria', 'ofertas', 'ultimos', 'titulo', 'minimo', 'maximo', 'buscar', 'orden', 'calificados'));
    }
}
