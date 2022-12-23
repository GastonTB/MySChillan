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
// use App\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use App\Models\Oferta;
use Illuminate\Support\Facades\File;



class productoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $productos = new Producto;
        $productos = Producto::latest()->paginate(5);

        foreach($productos as $producto)
        {
            $producto->precio = number_format($producto->precio, 0, ",", ".");
            if($producto->oferta_id != 0){
                $producto->oferta->precio_oferta = number_format($producto->oferta->precio_oferta, 0, ",", ".");
            }
        }

        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categorias = new Categoria;
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
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
        if($request->has('categorias'))
        {
            if($request->categorias[0] == 1 || $request->categorias[0] == 2 || $request->categorias[0] == 3 || $request->categorias[0] == 4 || $request->categorias[0] == 5){
                $planta = 1;
            }else{
                $planta = 0;
            }
        }

        $precio = $request->precio;
        $precio = str_replace(".", "", $precio);
        $precio = str_replace("$", "", $precio);
        $precio = str_replace(" ", "", $precio);
        $request->merge(['precio' => $precio]);

        if($planta == 1){
            $reglas = array(
                'nombre' => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/u|min:3|max:50',
                'precio' => 'required|numeric|min:3|max:100000',
                'cantidad' => 'required|numeric|min:1|max:1000',
                'descripcion_text' => 'required|min:10|max:999',
                'caracteristicas_text' => 'required|min:10|max:999',
                'categorias' => 'required',
                'temporada_text' => 'required',
                'cuidados_text' => 'required|min:10|max:999',
                'imagen_0' => 'required|image|mimes:jpeg,png,jpg',
                'imagen_1' => 'image|mimes:jpeg,png,jpg',
                'imagen_2' => 'image|mimes:jpeg,png,jpg',
                'imagen_3' => 'image|mimes:jpeg,png,jpg',
            );
            
            $mensaje = array(
                'required' => 'El campo :attribute es obligatorio',
                'alpha' => 'El campo :attribute solo puede contener letras',
                'min' => 'El campo :attribute debe tener al menos :min caracteres',
                'max' => 'El campo :attribute debe tener como máximo :max caracteres',
                'integer' => 'El campo :attribute debe ser un número entero',
                'required_without_all' => 'Debe subir al menos una imagen',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/u' => 'El nombre debe ser una palabra'
            );
            
        }else{
            $reglas = array(
                'nombre' => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/u|min:3|max:50',
                'precio' => 'required|integer|min:990|max:999999',
                'cantidad' => 'required|integer|min:1|max:999',
                'descripcion_text' => 'required|min:10|max:999',
                'caracteristicas_text' => 'required|min:10|max:999',
                'categorias' => 'required',
                'imagen_0' => 'required|image|mimes:jpeg,png,jpg',
                'imagen_1' => 'image|mimes:jpeg,png,jpg',
                'imagen_2' => 'image|mimes:jpeg,png,jpg',
                'imagen_3' => 'image|mimes:jpeg,png,jpg',
            ); 
            
            $mensaje = array(
                'required' => 'El campo :attribute es obligatorio',
                'alpha' => 'El campo :attribute solo puede contener letras',
                'min' => 'El campo :attribute debe tener al menos :min caracteres',
                'max' => 'El campo :attribute debe tener como máximo :max caracteres',
                'integer' => 'El campo :attribute debe ser un número entero',
                'required_without_all' => 'Debe subir al menos una imagen'
            );
        }
        
        $validador = Validator::make($request->all(), $reglas, $mensaje)
        ->setAttributeNames(
            [
                'nombre' => 'Nombre',
                'precio' => 'Precio',
                'cantidad' => 'Cantidad',
                'descripcion_text' => 'Descripción',
                'caracteristicas_text' => 'Características',
                'categorias' => 'Categoría',
                'temporada_text' => 'Temporada',
                'cuidados_text' => 'Cuidados',
                'imagen_0' => 'Imagen 1',
                'imagen_1' => 'Imagen 2',
                'imagen_2' => 'Imagen 3',
                'imagen_3' => 'Imagen 4',

            ]
        );
        $mensaje = $this->validacion($request);
        
        if($validador->fails()){
            return Redirect::back()
            ->withErrors($validador)
            ->withInput($request->except(['imagen_1', 'imagen_2', 'imagen_3', 'imagen_4']))
            // ->withInput()
            ->with('message',$mensaje);
        }else{
            if($mensaje != 0){
                return Redirect::back()
                ->withInput($request->except(['imagen_1', 'imagen_2', 'imagen_3', 'imagen_4']))
                ->with('message',$mensaje);
            }
        }
        
        if($request->has('temporada_text'))
        {
            $tamaño =  count($request->temporada_text);
            for($i = 0; $i < $tamaño; $i++)
            {   
    
                $temp[$i] = $request->temporada_text[$i];
    
                switch ($temp[$i]) {
                    case 1:
                        $temp[$i] = 'Otoño';
                        break;
                    case 2:
                        $temp[$i] = 'Invierno';
                        break;
                    case 3:
                        $temp[$i] = 'Primavera';
                        break;
                    case 4:
                        $temp[$i] = 'Verano';
                        break;
                }
            }
        }
        

        if($planta == 1){
            
            $temporada = implode('--', $temp);
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
        $producto->categoria_id = $request->categorias[0];
        $producto->created_at = date('Y-m-d H:i:s');

        
        $producto->save();


        for($i = 0; $i < 4 ; $i++)
        {
            if($request->hasFile('imagen_'.$i) != null){ 
                $filename = strrev($request->file('imagen_'.$i)->getClientOriginalName());
                $pos = strpos($filename, '.');
                $extension = strrev(substr($filename, 0, $pos));
                $nombre = $producto->id.'-'.$i.'.'.$extension;
                $nombre_array[] = $nombre;
                $ruta = storage_path().'/app/public/imagenes/'.$nombre;
                $img = Image::make($request->file('imagen_'.$i))->rotate(270);
                $img->resize(300,400);
                $img->save($ruta);
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
        $producto = Producto::findOrFail($id);
        $producto->categoria();
        $producto->imagenes =  explode('|', $producto->imagenes);
        $producto->descripcion = explode ('||', $producto->descripcion);
        $oferta = Oferta::where('id', $producto->oferta_id)->
        where('estado_oferta', '!=', 0)->first();
        //oferta fecha_fin en formato d/m/Y
        if($oferta != null){
            $oferta->fecha_fin = date('d/m/Y', strtotime($oferta->fecha_fin));
        }
        $cantidad = count($producto->descripcion);
        if($producto->categoria_id >0 && $producto->categoria_id < 6){
            $temporada = explode('--', $producto->descripcion[3]);
            $cantidad_temp = sizeof($temporada);
            return view('productos.show', compact('cantidad', 'oferta', 'producto', 'temporada', 'cantidad_temp'));
        }else{
            return view('productos.show', compact('cantidad', 'oferta', 'producto'));
        }
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->categoria();
        $producto->imagenes =  explode('|', $producto->imagenes);
        $imagenes = count($producto->imagenes);
        $producto->descripcion = explode ('||', $producto->descripcion);
        $contador = count($producto->descripcion);
        if($contador == 4){
            $temporadas = explode('--', $producto->descripcion[3]);
            $contador_temp = count($temporadas);
            for($i = 0; $i< $contador_temp; $i++){
                switch ($temporadas[$i]) {
                    case 'Otoño':
                        $temporadas[$i] = 1;
                        break;
                    case 'Invierno':
                        $temporadas[$i] = 2;
                        break;
                    case 'Primavera':
                        $temporadas[$i] = 3;
                        break;
                    case 'Verano':
                        $temporadas[$i] = 4;
                        break;
                }
            }
        }else{
            $temporadas = null;
        }
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias','temporadas', 'imagenes'));
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
        $planta = 1;
        if($request->has('categorias'))
        {
            if($request->categorias[0] == 1 || $request->categorias[0] == 2 || $request->categorias[0] == 3 || $request->categorias[0] == 4 || $request->categorias[0] == 5){
                $planta = 1;
            }else{
                $planta = 0;
            }
        }

        $precio = $request->precio;
        $precio = str_replace(".", "", $precio);
        $precio = str_replace("$", "", $precio);
        $precio = str_replace(" ", "", $precio);
        $request->merge(['precio' => $precio]);

        if($planta == 1){
            $reglas = array(
                'nombre' => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/u|min:3|max:50',
                'precio' => 'required|integer|min:990|max:100000',
                'cantidad' => 'required|integer|min:1|max:1000',
                'descripcion_text' => 'required|min:10|max:999',
                'caracteristicas_text' => 'required|min:10|max:999',
                'categorias' => 'required',
                'temporada_text' => 'required',
                'cuidados_text' => 'required|min:10|max:999',
                'imagen_0' => 'image|mimes:jpeg,png,jpg',
                'imagen_1' => 'image|mimes:jpeg,png,jpg',
                'imagen_2' => 'image|mimes:jpeg,png,jpg',
                'imagen_3' => 'image|mimes:jpeg,png,jpg',
                'cantidad_imagenes' => 'required|min:1|max:4'
            );
            
            $mensaje = array(
                'required' => 'El campo :attribute es obligatorio',
                'regex' => 'El campo :attribute solo puede contener letras y espacios',
                'min' => 'El campo :attribute debe tener al menos :min caracteres',
                'max' => 'El campo :attribute debe tener como máximo :max caracteres',
                'integer' => 'El campo :attribute debe ser un número entero',
                'required_without_all' => 'Debe subir al menos una imagen',
                'image' => 'El archivo debe ser una imagen',
                'mimes' => 'El archivo debe ser una imagen con formato jpeg, png o jpg',
                'cantidad_imagenes.min' => 'Debe subir al menos una imagen',
                'cantidad_imagenes.max' => 'Debe subir como máximo 4 imágenes',
                'cantidad_imagenes.required' => 'Debe subir al menos una imagen'
                
            );
            
        }else{
            $reglas = array(
                'nombre' => 'required|alpha|min:3|max:50',
                'precio' => 'required|integer|min:990|max:999999',
                'cantidad' => 'required|integer|min:1|max:999',
                'descripcion_text' => 'required|min:10|max:999',
                'caracteristicas_text' => 'required|min:10|max:999',
                'categorias' => 'required',
                'imagen_0' => 'image|mimes:jpeg,png,jpg',
                'imagen_1' => 'image|mimes:jpeg,png,jpg',
                'imagen_2' => 'image|mimes:jpeg,png,jpg',
                'imagen_3' => 'image|mimes:jpeg,png,jpg',
                'cantidad_imagenes' => 'required|min:1|max:4'
            ); 
            
            $mensaje = array(
                'required' => 'El campo :attribute es obligatorio',
                'alpha' => 'El campo :attribute solo puede contener letras',
                'min' => 'El campo :attribute debe tener al menos :min caracteres',
                'max' => 'El campo :attribute debe tener como máximo :max caracteres',
                'integer' => 'El campo :attribute debe ser un número entero',
                'required_without_all' => 'Debe subir al menos una imagen',
                'image' => 'El archivo debe ser una imagen',
                'mimes' => 'El archivo debe ser una imagen con formato jpeg, png o jpg',
                'cantidad_imagenes.min' => 'Debe subir al menos una imagen',
                'cantidad_imagenes.max' => 'Debe subir como máximo 4 imágenes',
                'cantidad_imagenes.required' => 'Debe subir al menos una imagen'
            );
        }

        $validador = Validator::make($request->all(), $reglas, $mensaje)
        ->setAttributeNames(
            [
                'nombre' => 'Nombre',
                'precio' => 'Precio',
                'cantidad' => 'Cantidad',
                'descripcion_text' => 'Descripción',
                'caracteristicas_text' => 'Características',
                'categorias' => 'Categoría',
                'temporada_text' => 'Temporada',
                'cuidados_text' => 'Cuidados',
                'imagen_0' => 'Imagen 1',
                'imagen_1' => 'Imagen 2',
                'imagen_2' => 'Imagen 3',
                'imagen_3' => 'Imagen 4',
                'cantidad_imagenes' => 'Cantidad de imágenes'

            ]
        );

        if($validador->fails()){
           
            return Redirect::back()
            ->withErrors($validador)
            ->withInput() ;
        }
        if($request->has('temporada_text'))
        {
            $tamaño =  count($request->temporada_text);
            for($i = 0; $i < $tamaño; $i++)
            {   
    
                $temp[$i] = $request->temporada_text[$i];
    
                switch ($temp[$i]) {
                    case 1:
                        $temp[$i] = 'Otoño';
                        break;
                    case 2:
                        $temp[$i] = 'Invierno';
                        break;
                    case 3:
                        $temp[$i] = 'Primavera';
                        break;
                    case 4:
                        $temp[$i] = 'Verano';
                        break;
                }
            }
        }


        if($planta == 1){
            
            $temporada = implode('--', $temp);
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
        
        //request nombre first char of every word to uppercase the rest lowercase
        $request->nombre = ucwords(strtolower($request->nombre));




        $categorias = $request->categorias;
        //explode categorias
        $categorias = implode(',', $categorias);
        $descripcion = implode('||', $descripcion_array);
        $producto = Producto::findOrFail($id);
        $producto->nombre_producto = $request->nombre;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;
        $producto->descripcion = $descripcion;
        $producto->categoria_id = $categorias;
        $producto->save();

        //alert
        Alert::success('El producto se ha editado con exito', 'Los nuevos valores serán visibles a los visitantes de la página');
        return redirect()->route('listado-productos');
        
        
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $producto = Producto::findOrFail($id);
        //delete images
        $imagenes = explode('|', $producto->imagenes);
        foreach($imagenes as $imagen){
            $ruta = storage_path().'/app/public/imagenes/'.$imagen;
            if(File::exists($ruta)){
                File::delete($ruta);
            }
        }
        $producto->delete();
        Alert::success('El producto se ha eliminado con exito', 'Ya no esta disponible para ser comprado');
        return redirect()->back();
    }


    public function validacion(Request $request)
    {   
        $contador = 0;
        for($i = 0; $i < 4; $i++)
        {
            if($request->hasFile('imagen_'.$i) == null)
            {
                $contador++;
            }else{
                $extension = substr($request->file('imagen_'.$i)->getClientOriginalName(),-3);
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

    public function buscar(Request $request)
    {
        //if request is empty
        if($request->buscar == null){
            return redirect()->route('listado-productos');
        }
        return redirect()->route('buscadosProductosAdmin', $request->buscar);
    }

    public function buscados($producto)
    {
        $productos = Producto::where('nombre_producto', 'like', '%'.$producto.'%')->paginate(10);
        if(count($productos) == 0){
            Alert::error('No se encontraron resultados', 'No se encontraron productos con el nombre ');
        }
        return view('productos.index', compact('productos'));
    }

    public function stock(Request $request)
    {   
        
        $reglas = array(
            'cantidad_stock' => 'required|numeric|min:1|max:1000',
        );
        $mensaje = array(
            'cantidad_stock.required' => 'Por favor ingrese una cantidad',
            'cantidad_stock.numeric' => 'La cantidad debe ser un numero',
            'cantidad_stock.min' => 'La cantidad debe ser mayor a 0',
            'cantidad_stock.max' => 'La cantidad debe ser menor a 1000',
        );
        $validador = Validator::make($request->all(), $reglas, $mensaje);
        if($validador->fails()){
            return Redirect::back()
            ->withErrors($validador)
            ->withInput()
            ->with('message', 'error-cantidad')
            ->with('cantidad', $request->cantidad_stock);
        }
        $id = $request->id_producto;
        $producto = Producto::findOrFail($id);
        $producto->cantidad = $request->cantidad_stock;
        $producto->save();
        Alert::success('El stock se ha actualizado con exito', 'La nueva cantidad estara disponible para comprar');
        return redirect()->back();
    }

    public function ordenar($id){

        switch($id){
            case 1:
                $productos = Producto::orderBy('nombre_producto', 'asc')->paginate(5);
                $titulo = 'Ordenado Por Nombre Ascendente';
                break;
            case 2:
                $productos = Producto::orderBy('nombre_producto', 'desc')->paginate(5);
                $titulo = 'Ordenado Por Nombre Descendente';
                break;
            case 3:
                $productos = Producto::orderBy('precio', 'asc')->paginate(5);
                $titulo = 'Ordenado Por Precio Menor a Mayor';
                break;
            case 4:
                $productos = Producto::orderBy('precio', 'desc')->paginate(5);
                $titulo = 'Ordenado Por Precio Mayor a Menor';
                break;
            case 5:
                $productos = Producto::orderBy('categoria_id', 'asc')->paginate(5);
                $titulo = 'Ordenado Por Categoria';
                break;
            case 6:
                $productos = Producto::orderBy('cantidad', 'asc')->paginate(5);
                $titulo = 'Ordenado Por Stock Menor a Mayor';
                break;
            case 7:
                $productos = Producto::orderBy('cantidad', 'desc')->paginate(5);
                $titulo = 'Ordenado Por Stock Mayor a Menor';
                break;
            case 8:
                $productos = Producto::latest()->paginate(5);
                $titulo = 'Ordenado Por Fecha de Creacion';
                break;
            default:
                $productos = Producto::latest()->paginate(5);
                break;

            
        }
        
        foreach($productos as $producto){
            $producto->precio = number_format($producto->precio, 0, ',', '.');
        }

        return view('productos.index', compact('productos' , 'titulo'));
    }
}
