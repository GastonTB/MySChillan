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
                    $contador = 0;
                }else{
                    $contador = count($carrito->productos);
                    if($contador >= 10){
                        $contador = '9+';
                    }
                }
        
                $view->with('carro', $contador);
            }else {
                //make a carrito session
                if(!Session::has('carrito')){
                    Session::put('carrito', array());
                }
                $contador = count(Session::get('carrito'));
                if($contador >= 10){
                    $contador = '9+';
                }
                $view->with('carro', $contador);
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
                    
                    $carrito = $carrito->push($carritoProductos[$i]);
                }
                $view->with('carrito', $carrito);
                
            }else{
                
                    //make a carrito session
                    if(!Session::has('carrito')){
                        Session::put('carrito', array());
                    }
                    $carrito = Session::get('carrito');
                    $view->with('carrito', $carrito);
                
            }
        });
    }

    public static function mergeCarritos()
    { 
            if(!Session::has('carrito')){
                Session::put('carrito', array());
            }
            $carrito = Session::get('carrito');

            $carritoModel = Carrito::where('user_id',Auth::user()->id)->first();
            if($carritoModel == null){
                $carritoModel = new Carrito;
                $carritoModel->user_id = Auth::user()->id;
                $carritoModel->total = 0;
                $carritoModel->save();
            }
            
            for($i = 0; $i < count($carrito); $i++){
                $duplicated = false;
                for($j = 0; $j < count($carritoModel->productos); $j++){
                    if($carrito[$i]['producto_id'] == $carritoModel->productos[$j]['producto_id']){
                        //add cantidad_carrito to cantidad_carrito
                        $carritoModel->productos[$j]['cantidad_carrito'] += $carrito[$i]['cantidad_carrito'];
                        $duplicated = true;
                        break;
                    }
                }
                if(!$duplicated){
                    $carritoModel->productos()->attach($carrito[$i]['producto_id'], ['cantidad_carrito' => $carrito[$i]['cantidad_carrito']]);
                }

            }
            //count total and and to carritoModel
            $total = 0;
            for($i = 0; $i < count($carritoModel->productos); $i++){
                $total += $carritoModel->productos[$i]['precio'] * $carritoModel->productos[$i]['cantidad_carrito'];
            }
            $carritoModel->save();
            Session::forget('carrito');
            return $carritoModel;
    }

    public static function getIdCarrito()
    {
        if(Auth::check()){
            $carrito = Carrito::where('user_id',Auth::user()->id)->first();
            if($carrito == null){
                $carrito = new Carrito;
                $carrito->user_id = Auth::user()->id;
                $carrito->save();
            }
            return $carrito->id;
        }else{
            
        }
    }
}
