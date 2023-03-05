<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrdenCompra;

class CheckOrderOwnership
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $id = $request->route('id');
        $order = OrdenCompra::findOrFail($id);

        // Si el usuario tiene el rol adecuado o si la orden de compra pertenece al usuario, se permite que el usuario continúe
        if ($user->userMetadata->rol_id == 1 || $user->userMetadata->rol_id == 2 && $user->id == $order->user_id) {
            return $next($request);
        }

        // Si la orden de compra no pertenece al usuario, se redirecciona al usuario a la página de inicio
        return redirect('/');
    }
}
