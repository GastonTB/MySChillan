<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\OrdenCompra;

class RevisarOrdenCompra extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'revisar:orden';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'revisa ordenes de compra';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $ordenes = OrdenCompra::all();
       foreach ($ordenes as $orden) {
           $now = now();
           $now = $now->format('Y-m-d H:i:s');
           $created_at = $orden->created_at;
           $created_at = $created_at->format('Y-m-d H:i:s');
           $diff = strtotime($now) - strtotime($created_at);
           $diff = $diff / 60;
           if($diff > 20 && $orden->estado == 0){
               if($orden->estado == 0){
                   $orden->estado = 2;
                   $orden->save();
                   foreach($orden->productos as $producto){
                       $producto->cantidad = $producto->cantidad + $producto->pivot->cantidad_orden_compra;
                       $producto->save();
                       \Log::info('se agrego el producto: '.$producto->id);
                   }
               }
               \Log::info('se cambio el estado de la orden: '.$orden->id);
           }
       }
    }
}
