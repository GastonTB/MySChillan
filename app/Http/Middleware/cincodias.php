<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\OrdenCompra;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;


class cincodias
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

        $ordenCompraId = $request->route()->parameter('id');
        $ordenCompra = OrdenCompra::find($ordenCompraId);
        
        if(!$ordenCompra){
            return redirect()->route('inicio');
        }

        if (Auth::user()->id !== $ordenCompra->user_id) {
            Alert::error('Error', 'No tienes permiso para acceder a esta orden de compra');
            return redirect()->route('inicio');
        }
    
        if ($ordenCompra->estado_retiro != 1) {
            Alert::error('Error', 'La orden de compra no ha sido enviada');
            return redirect()->route('inicio');
        }
    
        $fechaActual = Carbon::now();
        $fechaModificacion = Carbon::createFromFormat('Y-m-d H:i:s', $ordenCompra->updated_at);
        $diferenciaDias = $fechaActual->diffInDays($fechaModificacion);
    
        if ($diferenciaDias >= 5) {
            return $next($request);
        }
    
        Alert::error('Error', 'No han pasado 5 días desde que se actualizó la orden de compra');
        return redirect()->route('inicio');
    }
}
