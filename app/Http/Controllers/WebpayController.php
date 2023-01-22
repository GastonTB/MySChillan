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
use App\Models\Region;
use App\Models\Comuna;
use App\Models\UserMetadata;
use Illuminate\Support\Facades\Validator;
use App\Mail\CompraMailUsuario;
use Illuminate\Support\Facades\Mail;


use RealRashid\SweetAlert\Facades\Alert;

class WebpayController extends Controller
{
    public function webpayInicio()
    {
        return view('webpay.index');
    }

    public function webpayPagar(Request $request){

        
        //validate envio
        $validator = Validator::make($request->all(), [
            'envio' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Debe seleccionar un tipo de envío');
            return redirect()->route('comprar', compact('id', 'carrito_id'));
        }

        $user = User::find(Session::get('id'));
        $id = $user->id;
        $carrito = Carrito::where('user_id',Auth::user()->id)->first();
        $meta = UserMetadata::where('user_id', $id)->first();

        if($request->envio == 2){
            if($request->direccion_radio == 1){
                //validate comuna, direccion, correo, telefono
               

                $reglas = [
                    'comuna' => 'required',
                    'direccion' => 'required|min:7|max:100',
                    'correo' => 'required|email:rfc,dns|max:50',
                    'telefono' => 'required|digits:9'
                ];
                

                $mensajes = [
                    'comuna.required' => 'Debe seleccionar una comuna',
                    'direccion.required' => 'Debe ingresar una dirección',
                    'direccion.min' => 'La dirección debe tener al menos 7 caracteres',
                    'direccion.max' => 'La dirección debe tener como máximo 100 caracteres',
                    'correo.required' => 'Debe ingresar un correo',
                    'correo.email' => 'Debe ingresar un correo válido',
                    'correo.max' => 'El correo debe tener como máximo 50 caracteres',
                    'telefono.required' => 'Debe ingresar un teléfono',
                    'telefono.digits' => 'El teléfono debe tener 9 dígitos',
                ];

                $validator = Validator::make($request->all(), $reglas, $mensajes);

                if ($validator->fails()) {
                    Alert::error('Error', 'Debe completar todos los campos');
                    return redirect()->back()->withErrors($validator)->withInput()->with('message', 'error');
                }
            }
        }



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

        if($request->envio == 1){
            $orden = new OrdenCompra();
            $orden->user_id = $id;
            $orden->total = $total;
            $orden->estado = 0;
            $orden->envio = 1;
            $orden->telefono = $meta->telefono;
            $orden->correo = $user->email;
            $orden->direccion = $meta->direccion;
            $orden->comuna_id = $meta->comuna_id;
            $orden->estado_retiro = 0;
            $orden->save();
            
        }

        if($request->envio == 2){
            if($request->direccion_radio == 2){
                $orden = new OrdenCompra();
                $orden->user_id = $id;
                $orden->total = $total;
                $orden->estado = 0;
                $orden->envio = 2;
                $orden->telefono = $meta->telefono;
                $orden->correo = $user->email;
                $orden->direccion = $meta->direccion;
                $orden->comuna_id = $meta->comuna_id;
                $orden->estado_retiro = 0;
                $orden->save();
            }
            if($request->direccion_radio == 1){
                $orden = new OrdenCompra();
                $orden->user_id = $id;
                $orden->total = $total;
                $orden->estado = 0;
                $orden->envio = 2;
                $orden->telefono = $request->telefono;
                $orden->correo = $request->correo;
                $orden->direccion = $request->direccion;
                $orden->comuna_id = $request->comuna;
                $orden->estado_retiro = 0;
                $orden->save();
            }
        }
       
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

        if(isset($datos->token)){
            $carrito = Carrito::where('user_id',Auth::user()->id)->first();
            $array = [];
            foreach($carrito->productos as $producto){
                if($producto->cantidad < $producto->pivot->cantidad_carrito){
                    $array[] = $producto->nombre_producto;
                }
            }
            if(count($array) > 0){
                if(Auth::check()){
                    $user = User::find(Session::get('id'));
                    $id = $user->id;
                    $meta = UserMetadata::where('user_id', $id)->first();
                    $comuna_user = Comuna::where('id', $meta->comuna_id)->first();
                    $region_user = Region::where('id', $comuna_user->region_id)->first();
                    $carrito = Carrito::where('user_id',Auth::user()->id)->first();
                    $carrito_id = $carrito->id;
                    $productos = implode(", ", $array);
                    Alert::warning('Compra Cancelada', 'No hay suficientes productos en stock: '.$productos);
                    return view('compra.show', compact('carrito', 'user', 'meta', 'region_user', 'comuna_user'));
                }else{
                    Alert::warning('Compra Cancelada', 'No hay suficientes productos en stock');
                    return redirect()->route('inicio');
                }
            }else{
                foreach($carrito->productos as $producto){
                    $producto->cantidad = $producto->cantidad - $producto->pivot->cantidad_carrito;
                    $producto->save();
                }
    
            }
        }

        return view('webpay.pagar', compact('datos'));
    }

    public function webpayRespuesta(){

        if(!isset($_GET['token_ws'])){
            if(Auth::check()){
                $user = User::find(Session::get('id'));
                $id = $user->id;
                $meta = UserMetadata::where('user_id', $id)->first();
                $comuna_user = Comuna::where('id', $meta->comuna_id)->first();
                $region_user = Region::where('id', $comuna_user->region_id)->first();
                $carrito = Carrito::where('user_id',Auth::user()->id)->first();
                $carrito_id = $carrito->id;
                Alert::warning('Compra Cancelada', 'Intentelo nuevamente');
                return view('compra.show', compact('carrito', 'user', 'meta', 'region_user', 'comuna_user'));
            }else{
                Alert::warning('Compra Cancelada', 'Intentelo nuevamente');
                return redirect()->route('inicio');
            }
        }

        

       $response = Http::withHeaders(
           [
               'Content' => 'application/json',
               'Tbk-Api-Key-Id' => env('WEBPAY_ID'),
               'Tbk-Api-Key-Secret' => env('WEBPAY_SECRET')
           ]
       )->put(env('WEBPAY_URL').'/'.$_GET['token_ws'], []);

       $datos = json_decode($response);

        if(($datos->vci == 'TSY' && $datos->status == 'AUTHORIZED' && $datos->response_code == 0) || ($datos->vci == 'TSYS' && $datos->status == 'AUTHORIZED' && $datos->response_code == 0)){
              $orden = OrdenCompra::find($datos->buy_order);
              $orden->estado = 1;
              $orden->save();
              $carrito = Carrito::where('user_id',Auth::user()->id)->first();
              $carrito->productos()->detach();
              $productos = $orden->productos;
              $user = Auth::user();
              $meta = UserMetadata::where('user_id', $user->id)->first();
              $total = $orden->total;
              $comuna = Comuna::findOrFail($orden->comuna_id);
              $region = Region::findOrFail($comuna->region_id);
              if($user->email == $orden->correo){
                Mail::to($user->email)->send(new CompraMailUsuario($orden, $user, $productos, $total, $meta, $comuna, $region));

              }else{
                Mail::to($user->email)->send(new CompraMailUsuario($orden, $user, $productos, $total, $meta, $comuna, $region));
                Mail::to($orden->correo)->send(new CompraMailUsuario($orden, $user, $productos, $total, $meta, $comuna, $region));
              }
              Alert::success('Compra Exitosa', 'Su compra se ha realizado con exito');
              return redirect()->route('inicio');
        }else{
            if(Auth::check()){
                $user = User::find(Session::get('id'));
                $id = $user->id;
                $meta = UserMetadata::where('user_id', $id)->first();
                $comuna_user = Comuna::where('id', $meta->comuna_id)->first();
                $region_user = Region::where('id', $comuna_user->region_id)->first();
                $carrito = Carrito::where('user_id',Auth::user()->id)->first();
                $carrito_id = $carrito->id;
                Alert::warning('Compra Cancelada', 'Intentelo nuevamente');
                //re add the productos
                foreach($carrito->productos as $producto){
                    $producto->cantidad = $producto->cantidad + $producto->pivot->cantidad_carrito;
                    $producto->save();
                }
                return view('compra.show', compact('carrito', 'user', 'meta', 'region_user', 'comuna_user'));
            }else{
                Alert::warning('Compra Cancelada', 'Intentelo nuevamente');
                return redirect()->route('inicio');
            }
        }

    }
}
