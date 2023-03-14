<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Region;
use App\Models\Comuna;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\Validator;




class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        //$regiones = Helpers::getRegiones();
   
        //View::share('regiones', $regiones );

        //$comunas = Helpers::getComunas();

        //View::share('comunas', $comunas );

        $carro = Helpers::getCarro();

        $carrito = Helpers::getCarrito();
        
        $id_carrito = Helpers::getIdCarrito();

        

    }

   

}
