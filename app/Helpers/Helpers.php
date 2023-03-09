<?php

namespace App\Helpers;

use App\Models\Region;
use App\Models\Comuna;
use App\Models\User;
use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;
use App\Models\Oferta;
use App\Models\Categoria;
use RealRashid\SweetAlert\Facades\Alert;




class Helpers
{
    public static function getRegiones()
    {
        $regiones = Region::all();
        return $regiones;
    }

    public static function getComunas()
    {
        $comunas = Comuna::all();
        return $comunas;
    }

    public static function getCarro()
    {
        view()->composer('*', function ($view) {

            if (Auth::check()) {
                $id = Auth::user()->id;
                $carrito = Carrito::where('user_id', $id)->first();
                if ($carrito == null) {
                    $carrito = new Carrito();
                    $carrito->user_id = $id;
                    $carrito->save();
                    $contador = 0;
                    $total = 0;
                } else {
                    $contador = 0;
                    $total = 0;
                    foreach ($carrito->productos as $prod) {
                        $contador += $prod->pivot->cantidad_carrito;
                        if ($prod->oferta_id != 0 && $prod->oferta->estado_oferta == 1) {
                            $prod->precio = $prod->oferta->precio_oferta;
                        } else {
                            $prod->precio = $prod->precio;
                        }
                        $total += $prod->precio * $prod->pivot->cantidad_carrito;
                    }
                    if ($contador >= 10) {
                        $contador = '9+';
                    }
                }

                $view->with('carro', ['contador' => $contador, 'total' => $total]);
            } else {
                if (!Session::has('carrito')) {
                    Session::put('carrito', array());
                    $id_carrito = time();
                    Session::put('id_carrito', $id_carrito);
                    $total = 0;
                }
                $carrito = Session::get('carrito');
                $contador = 0;
                $total = 0;
                foreach ($carrito as $prod) {
                    $producto = Producto::findOrFail($prod['producto_id']);
                    if ($producto->oferta_id != 0 && $producto->oferta->estado_oferta == 1) {

                        $producto->precio = $producto->oferta->precio_oferta;

                        $producto->precio = $producto->precio;
                    } else {
                        $producto->precio = $producto->precio;
                    }
                    $contador += $prod['cantidad_carrito'];
                    $total += $producto->precio * $prod['cantidad_carrito'];
                }
                if ($contador >= 10) {
                    $contador = '9+';
                }
                $view->with('carro', ['contador' => $contador, 'total' => $total]);
            }
        });
    }

    public static function getCarrito()
    {
        view()->composer('*', function ($view) {
            if (Auth::check()) {
                $carrito = Carrito::where('user_id', Auth::user()->id)->first();
                if ($carrito == null) {
                    $carrito = new Carrito;
                    $carrito->user_id = Auth::user()->id;
                    $carrito->save();
                }
                $carritoProductos = $carrito->productos->toArray();
                $carrito = new Collection();

                for ($i = 0; $i < count($carritoProductos); $i++) {
                    $carritoProductos[$i]['imagenes'] = explode('|', $carritoProductos[$i]['imagenes']);
                    $carritoProductos[$i]['imagenes'] = $carritoProductos[$i]['imagenes'][0];
                    if ($carritoProductos[$i]['oferta_id'] != 0) {

                        $ofer = Oferta::find($carritoProductos[$i]['oferta_id']);
                        if($ofer->estado_oferta == 1){
                            $carritoProductos[$i]['precio'] = $ofer->precio_oferta;
                        }
                    }
                    $cat = Categoria::all();
                    $carritoProductos[$i]['categoria'] = $cat[$carritoProductos[$i]['categoria_id'] - 1]->nombre_categoria;

                    $carrito = $carrito->push($carritoProductos[$i]);
                }
                $view->with('carrito', $carrito);
            } else {

                if (!Session::has('carrito')) {
                    Session::put('carrito', array());
                    $id_carrito = time();
                    Session::put('id_carrito', $id_carrito);
                }
                $carrito = Session::get('carrito');
                for ($i = 0; $i < count($carrito); $i++) {
                    $producto = Producto::findOrFail($carrito[$i]['producto_id']);
                    $nombre = $producto->nombre_producto;
                    $carrito[$i]['imagenes'] = explode('|', $producto->imagenes);
                    $carrito[$i]['imagenes'] = $carrito[$i]['imagenes'][0];
                    if ($producto->oferta_id != 0) {

                        if($producto->oferta->estado_oferta == 1){
                            $carrito[$i]['precio'] = $producto->oferta->precio_oferta;
                        }else{
                            $carrito[$i]['precio'] = $producto->precio;
                        }
                        
                    } else {
                        $carrito[$i]['precio'] = $producto->precio;
                    }
                    $cat = Categoria::all();
                    $carrito[$i]['categoria'] = $cat[$producto->categoria_id - 1]->nombre_categoria;
                    $carrito[$i]['nombre_producto'] = $nombre;
                }

                $view->with('carrito', $carrito);
            }
        });
    }

    public static function mergeCarritos()
    {

        if (!Session::has('carrito')) {
            $id_carrito = time();
            Session::put('id_carrito', $id_carrito);
            Session::put('carrito', array());
        }
        $carrito = Session::get('carrito');
        $carritoModel = Carrito::where('user_id', Auth::user()->id)->first();
        if ($carritoModel == null) {
            $carritoModel = new Carrito;
            $carritoModel->user_id = Auth::user()->id;
            $carritoModel->save();
        }

        for ($i = 0; $i < count($carrito); $i++) {
            $duplicated = false;
            for ($j = 0; $j < count($carritoModel->productos); $j++) {
                if ($carrito[$i]['producto_id'] == $carritoModel->productos[$j]['id']) {
                    $carritoModel->productos()->updateExistingPivot($carrito[$i]['producto_id'], ['cantidad_carrito' => $carrito[$i]['cantidad_carrito'] + $carritoModel->productos[$j]->pivot->cantidad_carrito]);
                    $duplicated = true;
                    break;
                }
            }
            if (!$duplicated) {
                $carritoModel->productos()->attach($carrito[$i]['producto_id'], ['cantidad_carrito' => $carrito[$i]['cantidad_carrito']]);
            }
        }
        Session::forget('carrito');
        Session::forget('id_carrito');
    }

    public static function getIdCarrito()
    {
        view()->composer('*', function ($view) {
            if (Auth::check()) {
                $carrito = Carrito::where('user_id', Auth::user()->id)->first();
                if ($carrito == null) {
                    $carrito = new Carrito;
                    $carrito->user_id = Auth::user()->id;
                    $carrito->save();
                }
                $id_carrito = $carrito->id;
                $view->with('id_carrito', $id_carrito);
            } else {
                if (!Session::has('id_carrito')) {
                    $id_carrito = time();
                    Session::put('id_carrito', $id_carrito);
                } else {
                    $id_carrito = Session::get('id_carrito');
                }
                $view->with('id_carrito', $id_carrito);
            }
        });
    }

    public static function reordenarArray($id)
    {

        $carrito = Session::get('carrito');
        $contador = count($carrito);
        for ($i = 0; $i < $contador; $i++) {
            if ($carrito[$i]['producto_id'] == $id) {
                unset($carrito[$i]);
                break;
            }
        }
        if (count($carrito) == 0) {
            Session::forget('carrito');
            Session::forget('id_carrito');
        }
        $carrito2 = array_values($carrito);
        Session::put('carrito', $carrito2);
    }

    public static function getOfertas()
    {

        // $ofertas = Producto::where('oferta_id', '!=','0')->latest()->take(7)->get();
        //ofertas are producto where producto oferta_id not 0 and oferta estado_oferta not 0
        $ofertas = Producto::whereHas('oferta', function ($query) {
            $query->where('estado_oferta', '!=', '0');
        })->latest()->take(7)->get();

        foreach ($ofertas as $oferta) {
            $oferta->imagenes = explode('|', $oferta->imagenes);
            $oferta->imagenes = $oferta->imagenes[0];
        }

        return $ofertas;
    }

    public static function getUltimos()
    {
        $ultimos = Producto::latest()->take(7)->get();
        foreach ($ultimos as $ultimo) {
            $ultimo->imagenes = explode('|', $ultimo->imagenes);
            $ultimo->imagenes = $ultimo->imagenes[0];
            if ($ultimo->oferta_id != 0) {
                $ultimo->precio = $ultimo->oferta->precio_oferta;
            }
        }

        return $ultimos;
    }

    public static function getCalificados()
    {
        $calificados = Producto::whereHas('calificaciones', function ($query) {
            $query->where('puntuacion', '>', 0);
        })
            ->with('calificaciones')
            ->take(7)
            ->get();

        foreach ($calificados as $calificado) {
            $calificado->imagenes = explode('|', $calificado->imagenes);
            $calificado->imagenes = $calificado->imagenes[0];
            if ($calificado->oferta_id != 0) {
                $calificado->precio = $calificado->oferta->precio_oferta;
            }
        }

        return $calificados->map(function ($producto) {
            $producto->promedio_puntuacion = $producto->calificaciones->avg('puntuacion');
            return $producto;
        })->filter(function ($producto) {
            return $producto->promedio_puntuacion >= 4;
        })->sortByDesc('promedio_puntuacion');
    }


    public static function reordenar($id)
    {
        return $id;
        $producto = Producto::withTrashed()->find($id);
        if ($producto == null) {
            Alert::error('Error', 'El producto seleccionado no existe');
            return redirect()->back();
        }

        $imagenes = explode('|', $producto->imagenes);
        $extensiones = ['jpg', 'png', 'jpeg'];
        $nombres_archivos = null;
        $archivos = null;
        for ($i = 0; $i < 4; $i++) {
            foreach ($extensiones as $extension) {
                $ruta_archivo = public_path('storage/imagenes/' . $producto->id . '-' . $i . '.' . $extension);
                if (file_exists($ruta_archivo)) {
                    $archivos[] = $ruta_archivo;
                    $nombres_archivos_array[] = $producto->id . '-' . $i . '.' . $extension;
                    break;
                }
            }
        }

        if (count($imagenes) != count($nombres_archivos_array)) {
            Alert::error('Error', 'El número de imágenes en el producto no coincide con el número de archivos en la carpeta');
            return redirect()->back();
        }

        $iguales = true;

        for ($i = 0; $i < count($imagenes); $i++) {
            if ($imagenes[$i] != $nombres_archivos_array[$i]) {
                $iguales = false;
            }
        }

        if ($iguales == false) {
            Alert::error('Error', 'No se han encontrado las imagenes');
            return redirect()->back();
        }

        $nombres_archivos = array_map(function ($imagen) use ($extensiones) {
            $partes_nombre = explode('.', $imagen);
            $extension = end($partes_nombre);
            if (!in_array($extension, $extensiones)) {
                throw new Exception("Extensión no permitida: $extension");
            }
            $partes_nombre = explode('-', $partes_nombre[0]);
            $numero_archivo = intval(end($partes_nombre));
            $nombre = implode('-', array_slice($partes_nombre, 0, -1));
            return [
                'nombre' => $nombre,
                'numero' => $numero_archivo,
                'extension' => $extension
            ];
        }, $imagenes);

        for ($i = 0; $i < count($nombres_archivos); $i++) {
            $nombres_archivos[$i]['numero'] = $i;
        }


        $nombres_archivos_string = [];
        for ($i = 0; $i < count($nombres_archivos); $i++) {
            $nombre_archivo = $nombres_archivos[$i]['nombre'] . '-' . $i . '.' . $nombres_archivos[$i]['extension'];
            $nombres_archivos_string[] = $nombre_archivo;
        }


        for ($i = 0; $i < count($imagenes); $i++) {

            $ruta_archivo_actual = public_path('storage/imagenes/' . $nombres_archivos_array[$i]);
            $ruta_archivo_nueva = public_path('storage/imagenes/' . $nombres_archivos_string[$i]);
            if (file_exists($ruta_archivo_actual)) {
                rename($ruta_archivo_actual, $ruta_archivo_nueva);
                $imagenes[$i] = $nombres_archivos_string[$i];
            }
        }

        $imagenes_string = implode('|', $imagenes);

        $producto->imagenes = $imagenes_string;
        $producto->save();
    }
}
