<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Carrito;
use App\Models\OrdenCompra;
use App\Models\User;
use App\Models\Producto;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\Auth;


use RealRashid\SweetAlert\Facades\Alert;

class WebpayController extends Controller
{
    public function webpayInicio()
    {
        return view('webpay.index');
    }

    public function webpayPagar(){
    
        $user = User::find(Session::get('id'));
        $id = $user->id;
        $carrito = Carrito::where('user_id',Auth::user()->id)->first();
        //check if productos has ofertas
        $productos = $carrito->productos;
        foreach($productos as $producto){
            if($producto->oferta){
                $producto->precio = $producto->oferta->precio_oferta;
            }
        }
        $total = 0;
        foreach($carrito->productos as $item){
            $total += $item->pivot->cantidad_carrito * $item->precio;
        }
        $orden = new OrdenCompra();
        $orden->user_id = $id;
        $orden->total = $total;
        $orden->estado = 0;
        $orden->save();
        

        foreach($carrito->productos as $item){
            $orden->productos()->attach($item->id, ['cantidad_orden_compra' => $item->pivot->cantidad_carrito, 'precio_orden_compra' => $item->precio]);
        }

        $session = time();

        $response = Http::withHeaders(
            [
                'Content-Type' => 'application/json',
                'Tbk-Api-Key-Id' => env('WEBPAY_ID'),
                'Tbk-Api-Key-Secret' => env('WEBPAY_SECRET')
            ]
            )->post(env('WEBPAY_URL'),
            [
                "buy_order"=> $orden->id,
                "session_id"=> $session,
                "amount"=> $total,
                "return_url"=> "http://127.0.0.1:8000/webpay/respuesta"
            ]);
        
        if($response->status()!=200){
            Alert::error('Error', 'No se pudo conectar con el servidor de Webpay');
            return redirect()->route('comprar', compact('id', 'carrito_id'));
        }

        $datos = json_decode($response);
       
        return view('webpay.pagar', compact('datos'));
    }

    public function webpayRespuesta(){
        

        if(!isset($_GET['token_ws'])){
            if(Auth::check()){
                $user = User::find(Session::get('id'));
                $id = $user->id;
                $carrito = Carrito::where('user_id',Auth::user()->id)->first();
                $carrito_id = $carrito->id;
                Alert::warning('Compra Cancelada', 'Intentelo nuevamente');
                return redirect()->route('comprar', compact('id', 'carrito_id'));
            }else{
                Alert::warning('Compra Cancelada', 'Intentelo nuevamente');
                return redirect()->route('inicio');
            }
        }

        //check if there is enough stock
        $carrito = Carrito::where('user_id',Auth::user()->id)->first();
        foreach($carrito->productos as $producto){
            if($producto->cantidad < $producto->pivot->cantidad_carrito){
                if(Auth::check()){
                    $user = User::find(Session::get('id'));
                    $id = $user->id;
                    $carrito = Carrito::where('user_id',Auth::user()->id)->first();
                    $carrito_id = $carrito->id;
                    Alert::error('Compra Rechazada', 'No hay suficiente stock');
                    return redirect()->route('comprar', compact('id', 'carrito_id'));
                }else{
                    Alert::error('Compra Rechazada', 'No hay suficiente stock');
                    return redirect()->route('inicio');
                }
            }
        }

        $response = Http::withHeaders(
            [
                'Content-Type' => 'application/json',
                'Tbk-Api-Key-Id' => env('WEBPAY_ID'),
                'Tbk-Api-Key-Secret' => env('WEBPAY_SECRET')
            ]
        )->put(env('WEBPAY_URL').'/'.$_GET['token_ws'], []);
            
        $datos = json_decode($response);
        if($datos->vci != "TSY" || $datos->status != "AUTHORIZED"){
            //add producto to stock
            $carrito = Carrito::where('user_id',Auth::user()->id)->first();
            foreach($carrito->productos as $producto){
                $producto->cantidad += $producto->pivot->cantidad_carrito;
                $producto->save();
            }
            if(Auth::check()){
                $user = User::find(Session::get('id'));
                $id = $user->id;
                $carrito = Carrito::where('user_id',Auth::user()->id)->first();
                $carrito_id = $carrito->id;
                Alert::error('Compra Rechazada', 'Intentelo nuevamente');
                return redirect()->route('comprar', compact('id', 'carrito_id'));
            }else{
                Alert::error('Compra Rechazada', 'Intentelo nuevamente');
                return redirect()->route('inicio');
            }
        }else{
            $orden = OrdenCompra::find($datos->buy_order);
            $orden->estado = 1;
            $orden->save();
            $carrito = Carrito::where('user_id',Auth::user()->id)->first();
            //subtract cantidad from productos
            foreach($carrito->productos as $producto){
                $producto->cantidad = $producto->cantidad - $producto->pivot->cantidad_carrito;
                $producto->save();
            }
            $carrito->productos()->detach();
            Alert::success('Compra Exitosa', 'Gracias por su compra');
            return redirect()->route('inicio');
        }
        
        return view('webpay.respuesta', compact('datos'));
    }
}
