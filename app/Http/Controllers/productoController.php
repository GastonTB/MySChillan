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
use GrahamCampbell\ResultType\Success;
use Hamcrest\Type\IsNumeric;
use Illuminate\Support\Facades\File;
use App\Rules\AspectRatio;
use App\Helpers\Helpers;



class productoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $productos = Producto::withTrashed()
            ->with('calificaciones')
            ->withAvg('calificaciones', 'puntuacion')
            ->orderBy('nombre_producto','desc')
            ->paginate(10);

        $titulo = 'Listado de Productos';

        foreach ($productos as $producto) {
            $producto->precio = number_format($producto->precio, 0, ",", ".");
            if ($producto->oferta_id != 0) {
                $producto->oferta->precio_oferta = number_format($producto->oferta->precio_oferta, 0, ",", ".");
            }
        }

        return view('productos.index', compact('productos', 'titulo'));
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
        if ($request->has('categorias')) {
            if ($request->categorias[0] == 1 || $request->categorias[0] == 2 || $request->categorias[0] == 3 || $request->categorias[0] == 4 || $request->categorias[0] == 5) {
                $planta = 1;
            } else {
                $planta = 0;
            }
        }

        $precio = $request->precio;
        $precio = str_replace(".", "", $precio);
        $precio = str_replace("$", "", $precio);
        $precio = str_replace(" ", "", $precio);
        $request->merge(['precio' => $precio]);

        if ($planta == 1) {
            $reglas = array(
                'nombre' => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/u|min:3|max:50',
                'precio' => 'required|integer|min:990|max:100000',
                'cantidad' => 'required|integer|min:1|max:1000',
                'descripcion_text' => 'required|min:10|max:999',
                'caracteristicas_text' => 'required|min:10|max:999',
                'categorias' => 'required_without_all:categorias.*',
                'categorias.*' => ['required', 'integer', 'min:1', 'max:8'],
                'temporada_text.*' => ['required', 'integer', 'min:1', 'max:4'],
                'temporada_text' => 'required_without_all:temporada_text.*',
                'cuidados_text' => 'required|min:10|max:999',
                'imagen_0' => 'required|image|mimes:jpeg,png,jpg|dimensions:ratio=3/4,min_width=300,min_height=400',
                'imagen_1' => 'image|mimes:jpeg,png,jpg|dimensions:ratio=3/4,min_width=300,min_height=400',
                'imagen_2' => 'image|mimes:jpeg,png,jpg|dimensions:ratio=3/4,min_width=300,min_height=400',
                'imagen_3' => 'image|mimes:jpeg,png,jpg|dimensions:ratio=3/4,min_width=300,min_height=400',
            );

            $mensaje = array(
                'required' => 'El campo :attribute es obligatorio',
                'alpha' => 'El campo :attribute solo puede contener letras',
                'min' => 'El campo :attribute debe tener al menos :min caracteres',
                'max' => 'El campo :attribute debe tener como máximo :max caracteres',
                'integer' => 'El campo :attribute debe ser un número entero',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/u' => 'El nombre debe ser una palabra',
                'dimensions' => 'La imagen debe tener una proporción de 3:4 y un tamaño mínimo de 300px x 400px.',
                'imagen_0.required_without_all' => 'Debe subir al menos una imagen',
                'categorias.required_without_all' => 'Debe seleccionar una categoria',
                'temporada_text.required_without_all' => 'Debe seleccionar una temporada',
            );
        } else {
            $reglas = array(
                'nombre' => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/u|min:3|max:50',
                'precio' => 'required|integer|min:990|max:100000',
                'cantidad' => 'required|integer|min:1|max:999',
                'descripcion_text' => 'required|min:10|max:999',
                'caracteristicas_text' => 'required|min:10|max:999',
                'categorias' => 'required',
                'imagen_0' => 'required|image|mimes:jpeg,png,jpg|dimensions:ratio=3/4,min_width=300,min_height=400',
                'imagen_1' => 'image|mimes:jpeg,png,jpg|dimensions:ratio=3/4,min_width=300,min_height=400',
                'imagen_2' => 'image|mimes:jpeg,png,jpg|dimensions:ratio=3/4,min_width=300,min_height=400',
                'imagen_3' => 'image|mimes:jpeg,png,jpg|dimensions:ratio=3/4,min_width=300,min_height=400',
            );

            $mensaje = array(
                'required' => 'El campo :attribute es obligatorio',
                'alpha' => 'El campo :attribute solo puede contener letras',
                'min' => 'El campo :attribute debe tener al menos :min caracteres',
                'max' => 'El campo :attribute debe tener como máximo :max caracteres',
                'integer' => 'El campo :attribute debe ser un número entero',
                'imagen_0.required_without_all' => 'Debe subir al menos una imagen',
                'categorias.required_without_all' => 'Debe seleccionar una categoria',
                'dimensions' => 'La imagen debe tener una proporción de 3:4 y un tamaño mínimo de 300px x 400px.',
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

        if ($validador->fails()) {
            return Redirect::back()
                ->withErrors($validador)
                ->withInput($request->except(['imagen_1', 'imagen_2', 'imagen_3', 'imagen_4']))
                // ->withInput()
                ->with('message', $mensaje);
        } else {
            if ($mensaje != 0) {
                return Redirect::back()
                    ->withInput($request->except(['imagen_1', 'imagen_2', 'imagen_3', 'imagen_4']))
                    ->with('message', $mensaje);
            }
        }

        if ($request->has('temporada_text')) {
            $tamaño =  count($request->temporada_text);
            for ($i = 0; $i < $tamaño; $i++) {

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


        if ($planta == 1) {

            $temporada = implode('--', $temp);
            $descripcion_array =
                [
                    $request->descripcion_text,
                    $request->caracteristicas_text,
                    $request->cuidados_text,
                    $temporada,
                ];
        } else {
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


        for ($i = 0; $i < 4; $i++) {
            if ($request->hasFile('imagen_' . $i) != null) {
                $filename = strrev($request->file('imagen_' . $i)->getClientOriginalName());
                $pos = strpos($filename, '.');
                $extension = strrev(substr($filename, 0, $pos));
                $nombre = $producto->id . '-' . $i+1 . '.' . $extension;
                $nombre_array[] = $nombre;
                $ruta = storage_path() . '/app/public/imagenes/' . $nombre;
                $img = Image::make($request->file('imagen_' . $i));
                $img->resize(300, 400);
                $img->save($ruta);
            }
        }
        $nombre = implode('|', $nombre_array);
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
        $producto->descripcion = explode('||', $producto->descripcion);
        $oferta = Oferta::where('id', $producto->oferta_id)->where('estado_oferta', '!=', 0)->first();
        //oferta fecha_fin en formato d/m/Y
        if ($oferta != null) {
            $oferta->fecha_fin = date('d/m/Y', strtotime($oferta->fecha_fin));
        }
        $cantidad = count($producto->descripcion);
        if ($producto->categoria_id > 0 && $producto->categoria_id < 6) {
            $temporada = explode('--', $producto->descripcion[3]);
            $cantidad_temp = sizeof($temporada);
            return view('productos.show', compact('cantidad', 'oferta', 'producto', 'temporada', 'cantidad_temp'));
        } else {
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
        $producto = Producto::find($id);
        if ($producto == null) {
            Alert::error('Error', 'El producto no existe');
            return redirect()->route('backoffice');
        }
        $producto->categoria();
        $producto->imagenes =  explode('|', $producto->imagenes);
        $imagenes = count($producto->imagenes);
        $producto->descripcion = explode('||', $producto->descripcion);
        $contador = count($producto->descripcion);
        if ($contador == 4) {
            $temporadas = explode('--', $producto->descripcion[3]);
            $contador_temp = count($temporadas);
            for ($i = 0; $i < $contador_temp; $i++) {
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
        } else {
            $temporadas = null;
        }

        $categorias = Categoria::all();

        return view('productos.edit', compact('producto', 'categorias', 'temporadas', 'imagenes'));
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
        

        $producto = Producto::withTrashed()->find($id);
        if ($producto == null) {
            Alert::error('Error', 'El producto que ingreso no existe');
            return redirect()->route('backoffice');
        }



        $request->precio = str_replace(['$', '.'], '', $request->precio);

        // Unir el valor de $request->precio con el resto de los datos en $request
        $request->merge([
            'precio' => $request->precio,
        ]);

        $planta = 1;
        if ($request->has('categorias')) {
            if ($request->categorias == 1 || $request->categorias == 2 || $request->categorias == 3 || $request->categorias == 4 || $request->categorias == 5) {
                $planta = 1;
            } else {
                $planta = 0;
            }
        }
        if ($planta == 1) {
            $reglas = array(
                'nombre' => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/u|min:3|max:50',
                'precio' => 'required|integer|min:990|max:100000',
                'cantidad' => 'required|integer|min:1|max:1000',
                'descripcion_text' => 'required|min:10|max:999',
                'caracteristicas_text' => 'required|min:10|max:999',
                'categorias' => 'required|integer|min:1|max:8',
                'temporada_text.*' => ['required', 'integer', 'min:1', 'max:8'],
                'temporada_text' => 'required_without_all:temporada_text.*',
                'cuidados_text' => 'required|min:10|max:999',
                'imagen_1' =>  ['image', 'mimes:jpeg,png,jpg', new AspectRatio()],
                'imagen_2' => ['image', 'mimes:jpeg,png,jpg', new AspectRatio()],
                'imagen_3' => ['image', 'mimes:jpeg,png,jpg', new AspectRatio()],
                'imagen_4' => ['image', 'mimes:jpeg,png,jpg', new AspectRatio()],
            );

            $mensaje = array(
                'required' => 'El campo :attribute es obligatorio',
                'alpha' => 'El campo :attribute solo puede contener letras',
                'min' => 'El campo :attribute debe tener al menos :min caracteres',
                'max' => 'El campo :attribute debe tener como máximo :max caracteres',
                'integer' => 'El campo :attribute debe ser un número entero',
                'required_without_all' => 'Debe seleccionar al menos una temporada',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/u' => 'El nombre debe ser una palabra',
                'dimensions' => 'La imagen debe tener una proporción de 3:4 y un tamaño mínimo de 300px x 400px.',

            );
        } else {
            $reglas = array(
                'nombre' => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/u|min:3|max:50',
                'precio' => 'required|integer|min:990|max:100000',
                'cantidad' => 'required|integer|min:1|max:1000',
                'descripcion_text' => 'required|min:10|max:999',
                'caracteristicas_text' => 'required|min:10|max:999',
                'categorias' => 'required',
                'imagen_0' => ['image', 'mimes:jpeg,png,jpg', new AspectRatio()],
                'imagen_1' => ['image', 'mimes:jpeg,png,jpg', new AspectRatio()],
                'imagen_2' => ['image', 'mimes:jpeg,png,jpg', new AspectRatio()],
                'imagen_3' => ['image', 'mimes:jpeg,png,jpg', new AspectRatio()],
            );

            $mensaje = array(
                'required' => 'El campo :attribute es obligatorio',
                'alpha' => 'El campo :attribute solo puede contener letras',
                'min' => 'El campo :attribute debe tener al menos :min caracteres',
                'max' => 'El campo :attribute debe tener como máximo :max caracteres',
                'integer' => 'El campo :attribute debe ser un número entero',
                'required_without_all' => 'Debe subir al menos una imagen',
                'dimensions' => 'La imagen debe tener una proporción de 3:4 y un tamaño mínimo de 300px x 400px.',
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
                    'imagen_1' => 'Imagen 1',
                    'imagen_2' => 'Imagen 2',
                    'imagen_3' => 'Imagen 3',
                    'imagen_4' => 'Imagen 4',

                ]
            );
        if ($request->precio == null) {
            $request->precio = 0;
        }

        $precio_simbolo = number_format($request->precio, 0, ",", ".");
        $precio_simbolo = '$' . $precio_simbolo;

        $request->merge([
            'precio' => $precio_simbolo,
        ]);

        $imagenes = $producto->imagenes;

        $imagenes = explode('|', $imagenes);

        if ($validador->fails()) {
            return Redirect::back()
                ->withErrors($validador)
                ->withInput($request->except(['imagen_1', 'imagen_2', 'imagen_3', 'imagen_4']))
                ->with('message', $mensaje);
        }


        $imagenes = $producto->imagenes;

        $imagenes = explode('|', $imagenes);

        $imagenes = array_pad($imagenes, 4, null);

        for ($i = 0; $i < 4; $i++) {
            $imagenes[$i] = $imagenes[$i] ?? null;
        }

        $imagenes_ocultas = [
            $request->imagen_oculta_1,
            $request->imagen_oculta_2,
            $request->imagen_oculta_3,
            $request->imagen_oculta_4,
        ];
        $i = 0;
        for ($i; $i < 4; $i++) {

            if ($imagenes[$i] != null && $imagenes_ocultas[$i] == 'nueva') {
                $ruta_archivo_actual = public_path('storage/imagenes/' . $imagenes[$i]);
                if (file_exists($ruta_archivo_actual)) {
                    if ($request->hasFile('imagen_' . ($i + 1))) {
                        $extension = $request->file('imagen_' . ($i + 1))->getClientOriginalExtension();
                        $nombre_imagen = $imagenes[$i];
                        $nombre_imagen = explode('.', $imagenes[$i])[0];
                        $nombre_archivo = $nombre_imagen . '.' . $extension;
                        unlink($ruta_archivo_actual);
                        $request->file('imagen_' . ($i + 1))->storeAs('public/imagenes', $nombre_archivo);
                    }
                }
            }
            $array = [];
            if (($imagenes[$i] == null && $imagenes_ocultas[$i] == 'nueva')) {

                if ($request->hasFile('imagen_' . ($i + 1))) {
                    $extension = $request->file('imagen_' . ($i + 1))->getClientOriginalExtension();
                    $nombre_imagen = $producto->id . '-' . ($i + 1) . '.' . $extension;
                    $ruta_archivo_actual = public_path('storage/imagenes/' . $nombre_imagen);
                    $imagenes[$i] = $nombre_imagen;
                    $array = $ruta_archivo_actual;
                    // $request->file('imagen_' . ($i + 1))->storeAs('public/imagenes', $nombre_imagen);
                    $img = Image::make($request->file('imagen_' . $i+1))->rotate(270);
                    $img->resize(300, 400);
                    $img->save($ruta_archivo_actual);
                }
            }



            if ($request->hasFile('imagen_' . ($i + 1))) {
                $extension = $request->file('imagen_' . ($i + 1))->getClientOriginalExtension();
                $nombre_imagen = $producto->id . '-' . ($i + 1) . '.' . $extension;
                $ruta_archivo_actual = public_path('storage/imagenes/' . $nombre_imagen);
                $imagenes[$i] = $nombre_imagen;
                $request->file('imagen_' . ($i + 1))->storeAs('public/imagenes', $nombre_imagen);
                $img = Image::make($request->file('imagen_' . $i+1))->rotate(270);
                $img->resize(300, 400);
                $img->save($ruta_archivo_actual);
            }
        }
        $imagenes = array_filter($imagenes, function ($value) {
            return !is_null($value);
        });

        $imagenes = implode('|', $imagenes);

        $producto->nombre_producto = $request->nombre;

        if ($request->has('temporada_text')) {
            $tamaño =  count($request->temporada_text);
            for ($i = 0; $i < $tamaño; $i++) {

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


        if ($planta == 1) {

            $temporada = implode('--', $temp);
            $descripcion_array =
                [
                    $request->descripcion_text,
                    $request->caracteristicas_text,
                    $request->cuidados_text,
                    $temporada,
                ];
        } else {
            $descripcion_array =
                [
                    $request->descripcion_text,
                    $request->caracteristicas_text,
                ];
        }
        $descripcion = implode('||', $descripcion_array);
        $producto->nombre_producto = $request->nombre;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;
        $producto->descripcion = $descripcion;
        $producto->categoria_id = $request->categorias;

        $producto->imagenes = $imagenes;
        
        $producto->save();
        $id = $producto->id;

        $this->reordenar($id);

        Alert::success('El producto se ha editado con exito', 'Los nuevos datos serán visibles a los visitantes de la página');
        return redirect()->route('editarProducto', $producto->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $producto = Producto::find($id);
        if ($producto == null) {
            Alert::error('Error', 'El producto que ingreso no existe');
            return redirect()->route('backoffice');
        }

        // Soft Delete (opcional)
        $producto->delete();

        // Mensaje de confirmación
        Alert::success('El producto se ha eliminado con exito', 'Ya no esta disponible para ser comprado');
        return redirect()->back();
    }


    public function validacion(Request $request)
    {
        $contador = 0;
        for ($i = 0; $i < 4; $i++) {
            if ($request->hasFile('imagen_' . $i) == null) {
                $contador++;
            } else {
                $extension = substr($request->file('imagen_' . $i)->getClientOriginalName(), -3);
                if ($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg') {
                } else {
                    $numero = $i + 1;
                    $mensaje = 'La imagen ' . $numero . ' tiene un formato invalido';
                    return $mensaje;
                }
            }
            if ($contador == 4) {
                $mensaje = 'Por favor suba una imagen';
                return $mensaje;
            }
        }

        return 0;
    }

    public function buscar(Request $request)
    {
        $busqueda = $request->buscar;
        if($busqueda==null){
            return redirect()->route('listado-productos');
        }
        return redirect()->route('buscadosProductosAdmin', ['busqueda' => $busqueda]);
    }

   
    public function buscados($producto)
    {   
        $productos = Producto::where('nombre_producto', 'like', '%' . $producto . '%')->orderBy('nombre_producto','desc')->paginate(10);
        $search = $producto;
        return view('productos.index', compact('productos', 'search'));
    }

    public function filtrarAdmin(Request $request)
    {
        $busqueda = $request->busqueda;
        if ($busqueda == null) {
            $busqueda = 'todo';
        }

        $validator = Validator::make($request->all(), [
            'orden' => 'integer|max:2',
            'categoria' => 'integer|max:7|min:1',
        ]);

        
        if ($validator->fails()) {
            return redirect()->back();
        }


        $categoria = $request->categoria;
        $orden = $request->orden;

        return redirect()->route('filtrarProductosAdmin2',  array('busqueda' => $busqueda, 'categoria' => $categoria, 'orden' => $orden));
    }

    public function filtradosAdmin($busqueda, $categoria, $orden){
        
        $ordenar = $orden;

        switch ($orden) {
            case 1:
                $order = 'desc'; 
                $odernar = 1;
                break;
            case 2:
                $order = 'asc';
                $ordernar = 2;
                break;
            default:
                $order = 'desc';
                $odernar = 1;

                break;
        }

        if($busqueda == 'todo'){
            $productos = Producto::withTrashed()
                        ->with('calificaciones')
                        ->withAvg('calificaciones', 'puntuacion')
                        ->latest();
        }else{
            $productos = Producto::withTrashed()->where('nombre_producto', 'LIKE', '%' . $busqueda . '%')
            ->with('calificaciones')
            ->withAvg('calificaciones', 'puntuacion')
            ->latest();

        }


        switch ($categoria) {
            case 1:
                $productos = $productos->orderBy('nombre_producto', $order)->paginate(10);
                break;
            case 2:
                $productos = $productos->orderBy('precio', $order)->paginate(10);
                break;
            case 3:
                $productos = $productos->orderBy('cantidad', $order)->paginate(10);

                break;
            case 4:
                $productos = $productos->orderBy('categoria_id', $order)->paginate(10);
                break;
            case 5:
                $productos = $productos->with('calificaciones')
                    ->withAvg('calificaciones', 'puntuacion')
                    ->orderBy('calificaciones_avg_puntuacion', $order)
                    ->paginate(10);
                    break;
            case 6:
                $productos = $productos->orderBy('tipo_envio', $order)->paginate(10);
                break;
            case 7:
                $productos = $productos->orderBy('envio', $order)->paginate(10);
                break;
            default:
                $productos = $productos->orderBy('nombre_producto', 'desc')->paginate(10);
                $categoria = 1;
                break;
        }

        
        foreach ($productos as $producto) {
            $producto->precio = number_format($producto->precio, 0, ",", ".");
            if ($producto->oferta_id != 0) {
                $producto->oferta->precio_oferta = number_format($producto->oferta->precio_oferta, 0, ",", ".");
            }
        }

        $search = $busqueda;

        return view('productos.index', compact('busqueda', 'categoria','ordenar','productos', 'search'));

    }

    public function buscarSinStock(Request $request)
    {
        //if request is empty
        if ($request->buscar == null) {
            return redirect()->route('listado-productos');
        }
        return redirect()->route('buscadosProductosAdminSinStock', $request->buscar);
    }


    public function buscadosSinStock($producto)
    {
        $productos = Producto::where('nombre_producto', 'like', '%' . $producto . '%')->paginate(10);
        if (count($productos) == 0) {
            Alert::error('No se encontraron resultados', 'No se encontraron productos con el nombre ');
        }
        return view('productos.sinstock', compact('productos'));
    }

    public function stock(Request $request)
    {

        $reglas = array(
            'cantidad_stock' => 'required|numeric|min:0|max:1000',
        );
        $mensaje = array(
            'cantidad_stock.required' => 'Por favor ingrese una cantidad',
            'cantidad_stock.numeric' => 'La cantidad debe ser un numero',
            'cantidad_stock.min' => 'La cantidad debe ser mayor a 0',
            'cantidad_stock.max' => 'La cantidad debe ser menor a 1000',
        );
        $validador = Validator::make($request->all(), $reglas, $mensaje);
        if ($validador->fails()) {
            Alert::error('Error', 'Valor invalido');
            return Redirect::back();
        }
        $id = $request->id_producto;
        $producto = Producto::findOrFail($id);
        $producto->cantidad = $request->cantidad_stock;
        $producto->save();
        Alert::success('El stock se ha actualizado con exito', 'La nueva cantidad estara disponible para comprar');
        return redirect()->back();
    }

    public function ordenar($id)
    {

        switch ($id) {
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

        foreach ($productos as $producto) {
            $producto->precio = number_format($producto->precio, 0, ',', '.');
        }

        return view('productos.index', compact('productos', 'titulo'));
    }

    public function sinStock()
    {
        $productos = Producto::where('cantidad', 0)->paginate(5);
        foreach ($productos as $producto) {
            $producto->precio = number_format($producto->precio, 0, ",", ".");
            if ($producto->oferta_id != 0) {
                $producto->oferta->precio_oferta = number_format($producto->oferta->precio_oferta, 0, ",", ".");
            }
        }
        return view('productos.sinstock', compact('productos'));
    }


    public function recover($id)
    {
        $producto = Producto::onlyTrashed()->find($id);
        if ($producto == null) {
            Alert::error('Error', 'El producto seleccionado no existe');
            return redirect()->back();
        }
        $producto->restore();

        Alert::success('Éxito', 'Producto recuperado correctamente');
        return redirect()->back();
    }

    public function test($id)
    {
        return $id;
    }

    public function reordenar($id)
{
    $producto = Producto::withTrashed()->find($id);

    $imagenes = explode('|', $producto->imagenes);

    // Recorrer el array y cambiar la X de cada imagen
    for ($i = 0; $i < count($imagenes); $i++) {
        // Obtener la X del nombre de la imagen actual
        $extension = pathinfo($imagenes[$i], PATHINFO_EXTENSION);
        $nombre_imagen = pathinfo($imagenes[$i], PATHINFO_FILENAME);
        $x = intval(substr($nombre_imagen, strrpos($nombre_imagen, '-') + 1));

        // Cambiar la X por el índice + 1
        $nuevo_nombre = $producto->id . '-' . ($i + 1) . '.' . $extension;

        // Buscar si la imagen actual existe en la carpeta de imágenes
        $ruta_actual = storage_path('app/public/imagenes/' . $imagenes[$i]);
        if (file_exists($ruta_actual)) {
            // Verificar si la nueva imagen ya existe en la carpeta
            $ruta_nueva = storage_path('app/public/imagenes/' . $nuevo_nombre);
            $imagenes_nuevas = [];
            for ($j = 0; $j < count($imagenes); $j++) {
                $extension_nueva = pathinfo($imagenes[$j], PATHINFO_EXTENSION);
                $nombre_imagen_nueva = pathinfo($imagenes[$j], PATHINFO_FILENAME);
                $x_nueva = intval(substr($nombre_imagen_nueva, strrpos($nombre_imagen_nueva, '-') + 1));
                $nuevo_nombre_imagen = $producto->id . '-' . ($j + 1) . '.' . $extension_nueva;
                $imagenes_nuevas[] = $nuevo_nombre_imagen;
            }
            if (file_exists($ruta_nueva) && $imagenes[$i] != $imagenes_nuevas[$i]) {
                // Cambiar el nombre del archivo existente por uno temporal
                $temp = $producto->id . '-temp-' . $i . '.' . $extension;
                Storage::move('public/imagenes/' . $nuevo_nombre, 'public/imagenes/' . $temp);
            }
            // Renombrar el archivo actual con el nuevo nombre
            Storage::move('public/imagenes/' . $imagenes[$i], 'public/imagenes/' . $nuevo_nombre);
        }

        // Actualizar el nombre de la imagen en el array de imágenes
        $imagenes[$i] = $nuevo_nombre;
    }

    // Actualizar la lista de imágenes en la base de datos
    $producto->imagenes = implode('|', $imagenes);
    $producto->save();

}

    public function borrarImagen(Request $request, $id)
    {
        $numero = $request->imagen;
        $numero = intval($numero);

        // Validar el número de imagen
        if ($numero > 4 || $numero < 1) {
            Alert::error('Error', 'El la imagen solicitada no existe');
            return redirect()->back();
        }

        $producto = Producto::withTrashed()->find($id);

        // Validar si el producto existe
        if (!$producto) {
            Alert::error('Error', 'El producto no existe');
            return redirect()->back();
        }

        $imagenes = explode('|', $producto->imagenes);

        if (count($imagenes) == 1) {
            Alert::error('Error', 'No puede borrar todas las imagenes de un producto');
            return redirect()->back();
        }

        $ruta_archivo_actual = public_path('storage/imagenes/' . $imagenes[$numero - 1]);

        if (file_exists($ruta_archivo_actual)) {
            unlink($ruta_archivo_actual);
            unset($imagenes[$numero - 1]);
        }

        $imagenes = array_values($imagenes);
        $imagenes = implode('|', $imagenes);
        $producto->imagenes = $imagenes;
        $producto->save();

        // Llamado a la función reordenar para actualizar la numeración de las imágenes
        $this->reordenar($producto->id);

        // Mostrar mensaje de éxito y redirigir a la página anterior
        Alert::success('Imagen eliminada', 'La imagen se ha eliminado exitosamente');
        return redirect()->back();
    }
}
