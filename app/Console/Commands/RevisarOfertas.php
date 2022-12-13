<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Oferta;
use App\Models\Producto;

class RevisarOfertas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'revisar:ofertas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Revisa y actualiza los estados de las ofertas';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        //today
        $today = now();
        //today y-m-d
        $today = $today->format('Y-m-d');
        $ofertas = Oferta::all();
        foreach ($ofertas as $oferta) {
            $producto = Producto::where('oferta_id', $oferta->id)->first();
            if($producto){
                if($oferta->fecha_fin < $today){
                    $producto->oferta_id = null;
                    $producto->save();
                    $oferta->delete();
                }

                if($oferta->estado_oferta == 0){
                    if($oferta->fecha_ini > $today){
                        $oferta->estado_oferta = 1;
                        $oferta->save();
                    }
                }
                
                //if oferta->fecha_inicio > today
                if($oferta->fecha_ini > $today){
                    $producto->oferta_id = null;
                    $producto->save();
                    $oferta->estado_oferta = 0;
                }
                
            }else{
                $oferta->delete();
            }
        }
    }
}
