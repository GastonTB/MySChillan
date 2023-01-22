<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitante;

class Visitantes
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
        $ip = $request->ip();
        //check if this ip is in the database in the last month else change updated at
        $visitante = Visitante::where('ip',$ip)->first();
        if($visitante){
            $visitante->touch();
        }else{
            $visitante = new Visitante();
            $visitante->ip = $ip;
            $visitante->save();
        }
        return $next($request);
    }
}
