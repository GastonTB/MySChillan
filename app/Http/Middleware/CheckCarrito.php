<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrito;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class CheckCarrito
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        if(Auth::check()){
            $user = User::find(Auth::id());
            $carrito = Carrito::where('user_id', $user->id)->first();
            if($carrito->id == $request->id)
            {
                return $next($request);
            }
            else{
                return redirect()->route('mostrarCarrito',$carrito->id);
            }
        }else{
            //check if session has id
            if(Session::has('id_carrito')){
                if (Session::get('id_carrito') == $request->id){
                   if(Session::has('carrito')){
                        if(count(Session::get('carrito'))>0){
                            return $next($request);
                        }else{
                            return redirect()->route('inicio');
                        }
                   }else{
                        return redirect()->route('inicio');
                   }
                }else{
                    if(Session::has('carrito')){
                        $carrito = Session::get('carrito');
                        if(count($carrito)>0){
                            return redirect()->route('mostrarCarrito',$id_carrito);
                        }else{
                            return redirect()->route('inicio');
                        }
                    }else{
                        return redirect()->route('inicio');
                    }
                }
            }else{
                return redirect()->route('inicio');
            }
            
        }
    }
}