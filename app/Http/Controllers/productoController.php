<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Comuna;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Rules\Imagenes;
use App\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;



class productoController extends Controller
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
        $regiones = new Region;
        $regiones = Region::all();
        $comunas = new Comuna;
        $comunas = Comuna::all();
        $categorias = new Categoria;
        $categorias = Categoria::all();
        return view('productos.create', compact('regiones', 'comunas', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $planta = 1;
        if($request->categorias != null)
        {
            foreach($request->categorias as $categoria)
            {
                if($categoria != null)
                {
                    $array_categorias[] = $categoria;
                }
            }
            for($i = 0; $i < count($array_categorias); $i++){
                if($array_categorias[$i] == 0 || $array_categorias[$i] == 1 || $array_categorias[$i] == 2 || $array_categorias[$i] == 3 || $array_categorias[$i] == 4)
                {
                    $planta = 1;
                }else{
                    $planta = 0;
                }
            }
        }

        //validar
        //si es planta
        if($planta == 1){
            $reglas = array(
                'nombre' => 'required|alpha|min:3|max:50',
                'precio' => 'required|integer|min:990|max:999999',
                'cantidad' => 'required|integer|min:1|max:999',
                'descripcion_text' => 'required|min:10|max:999',
                'caracteristicas_text' => 'required|min:10|max:999',
                'categorias' => 'required',
                'temporada_text' => 'required',
                'cuidados_text' => 'required|min:10|max:999'
            );  
        }else{
            $reglas = array(
                'nombre' => 'required|alpha|min:3|max:50',
                'precio' => 'required|integer|min:990|max:999999',
                'cantidad' => 'required|integer|min:1|max:999',
                'descripcion_text' => 'required|min:10|max:999',
                'caracteristicas_text' => 'required|min:10|max:999',
                'categorias' => 'required',
            );  
        }
        
        $validador = Validator::make($request->all(), $reglas);
        $mensaje = $this->validacion($request);
        
        if($validador->fails()){
            return Redirect::back()
            ->withErrors($validador)
            ->withInput($request->except('imagen0', 'imagen1', 'imagen2', 'imagen3'))
            ->with('message',$mensaje);
        }else{
            if($mensaje != 0){
                return Redirect::back()
                ->withInput($request->except('imagen0', 'imagen1', 'imagen2', 'imagen3'))
                ->with('message',$mensaje);
            }
        }
        
        if($planta == 1){
            $temporada = implode('--', $request->temporada_text);
            $descripcion_array =
                [
                    $request->descripcion_text,
                    $request->caracteristicas_text,
                    $request->cuidados_text,
                    $temporada,
                ];
        }else{
            $descripcion_array =
                [
                    $request->descripcion_text,
                    $request->caracteristicas_text,
                ];
        }

        $descripcion = implode('||', $descripcion_array);
        $producto = new Producto;
        $producto->nombre_producto = $request->nombre;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;
        $producto->descripcion = $descripcion;
        $producto->save();

        if($request->has('categorias'))
        {
            $producto->categorias()->attach($request->categorias);
        }

        $contador = 0;
        for($i = 0; $i < 4 ; $i++)
        {
            if($request->hasFile('imagen'.$i) != null){
                $contador ++;
                $extension = substr($request->file('imagen'.$i)->getClientOriginalName(),-3);
                $nombre = $producto->id.'-'.$contador.'.'.$extension;
                $nombre_array[] = $nombre;
                $ruta = storage_path().'\app\public\imagenes/'.$nombre;
                Image::make($request->file('imagen'.$i))->resize(null,300)->save($ruta);
            }
        }

        $nombre = implode('|',$nombre_array);
        $producto->imagenes = $nombre;
        $producto->save();
        
        Alert::success('El producto se ha ingresado con exito', 'Esta disponible para ser comprado');
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
        return 'hola';
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


    public function validacion(Request $request)
    {   
        $contador = 0;
        for($i = 0; $i < 4; $i++)
        {
            if($request->hasFile('imagen'.$i) == null)
            {
                $contador++;
            }else{
                $extension = substr($request->file('imagen'.$i)->getClientOriginalName(),-3);
                if($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg')
                {

                }else{
                    $numero = $i+1;
                    $mensaje = 'La imagen '.$numero.' tiene un formato invalido';
                    return $mensaje;
                }
            }
            if($contador == 4)
            {   
                $mensaje = 'Por favor suba una imagen';
                return $mensaje;
            }
        }
        
        return 0;


    }
}
