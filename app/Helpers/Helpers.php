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
        view()->composer('*', function($view)
        {   
            
            if (Auth::check()) {
                $id = Auth::user()->id;
                $carrito = Carrito::where('user_id',$id)->first();
                if($carrito == null){
                    $carrito = new Carrito();
                    $carrito->user_id = $id;
                    $carrito->save();
                    $contador = 0;
                    $total = 0;
                }else{
                    $contador = 0;
                    $total = 0;
                    foreach($carrito->productos as $prod){
                        $contador += $prod->pivot->cantidad_carrito;
                        if($prod->oferta_id !=0 && $prod->oferta->estado_oferta != 0){
                                $prod->precio = $prod->oferta->precio_oferta;
                        }else{
                            $prod->precio = $prod->precio;
                        }
                            $total += $prod->precio * $prod->pivot->cantidad_carrito;

                    }
                    if($contador >= 10){
                        $contador = '9+';
                    }
                }

                $view->with('carro', ['contador' => $contador, 'total' => $total]);
            }else {
                if(!Session::has('carrito')){
                    Session::put('carrito', array());
                    $id_carrito = time();
                    Session::put('id_carrito', $id_carrito);
                    $total = 0;

                }
                $carrito = Session::get('carrito');
                $contador = 0;
                $total = 0;
                foreach($carrito as $prod){
                    $producto = Producto::findOrFail($prod['producto_id']);
                    if($producto->oferta_id != 0){
                       if($producto->oferta->estado_oferta != 0 && $producto->oferta->estado_oferta!=0){
                           $producto->precio = $producto->oferta->precio_oferta;
                       }else{
                           $producto->precio = $producto->precio;
                       }

                    }else{
                        $producto->precio = $producto->precio;
                    }
                    $contador += $prod['cantidad_carrito'];
                    $total += $producto->precio * $prod['cantidad_carrito'];
                }
                if($contador >= 10){
                    $contador = '9+';
                }
                $view->with('carro', ['contador' => $contador, 'total' => $total]);
            }
        });
    }

    public static function getCarrito()
    {
        view()->composer('*', function($view)        
        {
            if(Auth::check())
            {
                $carrito = Carrito::where('user_id',Auth::user()->id)->first();
                if($carrito == null){
                    $carrito = new Carrito;
                    $carrito->user_id = Auth::user()->id;
                    $carrito->save();
                }
                $carritoProductos = $carrito->productos->toArray();
                $carrito = new Collection();

                for($i = 0; $i < count($carritoProductos); $i++){
                    $carritoProductos[$i]['imagenes'] = explode('|', $carritoProductos[$i]['imagenes']);
                    $carritoProductos[$i]['imagenes'] = $carritoProductos[$i]['imagenes'][0];
                    if($carritoProductos[$i]['oferta_id'] != 0){
                        $ofer = Oferta::find($carritoProductos[$i]['oferta_id']);
                        if($ofer->estado_oferta!=0){
                            $carritoProductos[$i]['precio'] = $ofer->precio_oferta;
                        }
                    }
                    $cat = Categoria::all();
                    $carritoProductos[$i]['categoria'] = $cat[$carritoProductos[$i]['categoria_id']-1]->nombre_categoria;

                    $carrito = $carrito->push($carritoProductos[$i]);
                }
                $view->with('carrito', $carrito);

            }else{

                    if(!Session::has('carrito')){
                        Session::put('carrito', array());
                        $id_carrito = time();
                        Session::put('id_carrito', $id_carrito);
                    }
                    $carrito = Session::get('carrito');
                    for($i = 0; $i < count($carrito); $i++){
                        $producto = Producto::findOrFail($carrito[$i]['producto_id']);
                        $nombre = $producto->nombre_producto;
                        $carrito[$i]['imagenes'] = explode('|', $producto->imagenes);
                        $carrito[$i]['imagenes'] = $carrito[$i]['imagenes'][0];
                        if($producto->oferta_id != 0 && $producto->oferta->estado_oferta != 0){
                            $ofer = Oferta::find($producto->oferta_id);
                            if($ofer->estado_oferta!=0){
                                $carrito[$i]['precio'] = $ofer->precio_oferta;
                            }
                        }else{
                            $carrito[$i]['precio'] = $producto->precio;
                        }
                        $cat = Categoria::all();
                        $carrito[$i]['categoria'] = $cat[$producto->categoria_id-1]->nombre_categoria;
                        $carrito[$i]['nombre_producto'] = $nombre;

                    }
                    
                    $view->with('carrito', $carrito);

            }
        });
    }

    public static function mergeCarritos()
    {

            if(!Session::has('carrito')){
                $id_carrito = time();
                Session::put('id_carrito', $id_carrito);
                Session::put('carrito', array());
            }
            $carrito = Session::get('carrito');
            $carritoModel = Carrito::where('user_id',Auth::user()->id)->first();
            if($carritoModel == null){
                $carritoModel = new Carrito;
                $carritoModel->user_id = Auth::user()->id;
                $carritoModel->save();
            }

            for($i = 0; $i < count($carrito); $i++){
                $duplicated = false;
                for($j = 0; $j < count($carritoModel->productos); $j++){
                    if($carrito[$i]['producto_id'] == $carritoModel->productos[$j]['id']){
                        $carritoModel->productos()->updateExistingPivot($carrito[$i]['producto_id'], ['cantidad_carrito' => $carrito[$i]['cantidad_carrito'] + $carritoModel->productos[$j]->pivot->cantidad_carrito]);
                        $duplicated = true; 
                        break;
                    }
                }
                if(!$duplicated){
                    $carritoModel->productos()->attach($carrito[$i]['producto_id'], ['cantidad_carrito' => $carrito[$i]['cantidad_carrito']]);
                }

            }
            Session::forget('carrito');
            Session::forget('id_carrito');

    }

    public static function getIdCarrito()
    {
        view()->composer('*', function($view)
        {
            if(Auth::check()){
                $carrito = Carrito::where('user_id',Auth::user()->id)->first();
                if($carrito == null){
                    $carrito = new Carrito;
                    $carrito->user_id = Auth::user()->id;
                    $carrito->save();
                }
                $id_carrito = $carrito->id;
                $view->with('id_carrito', $id_carrito);

            }else{
                if(!Session::has('id_carrito')){
                    $id_carrito = time();
                    Session::put('id_carrito', $id_carrito);
                }else{
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
            for($i = 0; $i < $contador; $i++){
                if($carrito[$i]['producto_id'] == $id){
                    unset($carrito[$i]);
                    break;
                }
            }
            if(count($carrito)==0){
                Session::forget('carrito');
                Session::forget('id_carrito');
            }
            $carrito2 = array_values($carrito);
            Session::put('carrito', $carrito2);
    }

    public static function getOfertas()
    {
        $ofertas = Producto::where('oferta_id', '!=','0')->latest()->take(7)->get();

        foreach($ofertas as $oferta)
        {
            $oferta->imagenes = explode('|', $oferta->imagenes);
            $oferta->imagenes = $oferta->imagenes[0];
        }

        return $ofertas;
    }

    public static function getUltimos()
    {
        $ultimos = Producto::latest()->take(7)->get();
        foreach($ultimos as $ultimo)
        {
            $ultimo->imagenes = explode('|', $ultimo->imagenes);
            $ultimo->imagenes = $ultimo->imagenes[0];
        }

        return $ultimos;
    }

    
}
