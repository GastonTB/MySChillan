<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Region;
use App\Models\Comuna;
use App\Models\User;
use App\Models\Carrito;
use App\Models\Producto;
use App\Models\Oferta;
use Illuminate\Support\Facades\Auth;



class HelpersServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path().'/Helpers/Helpers.php';
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
       

    }

   

}
