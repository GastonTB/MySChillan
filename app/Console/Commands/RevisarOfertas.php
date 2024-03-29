<?php

// namespace App\Console\Commands;

// use Illuminate\Console\Command;
// use App\Models\Oferta;
// use App\Models\Producto;

// class RevisarOfertas extends Command
// {
//     /**
//      * The name and signature of the console command.
//      *
//      * @var string
//      */
//     protected $signature = 'revisar:ofertas';

//     /**
//      * The console command description.
//      *
//      * @var string
//      */
//     protected $description = 'Revisa y actualiza los estados de las ofertas';

//     /**
//      * Execute the console command.
//      *
//      * @return int
//      */
//     public function handle()
//     {   
//         //today
//         $today = now();
//         //today y-m-d
//         $today = $today->format('Y-m-d');
//         $ofertas = Oferta::all();
//         foreach ($ofertas as $oferta) {
//             $producto = Producto::where('oferta_id', $oferta->id)->first();
//             if($producto){
//                 if($oferta->fecha_fin < $today){
//                     $producto->oferta_id = null;
//                     $producto->save();
//                     $oferta->delete();
//                 }

//                 if($oferta->estado_oferta == 0){
//                     if($oferta->fecha_ini > $today){
//                         $oferta->estado_oferta = 1;
//                         $oferta->save();
//                     }
//                 }

//                 //if oferta->fecha_inicio > today
//                 if($oferta->fecha_ini > $today){
//                     $producto->oferta_id = null;
//                     $producto->save();
//                     $oferta->estado_oferta = 0;
//                 }

//             }else{
//                 $oferta->delete();
//             }
//         }
//     }
// }


namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\Oferta;
use App\Models\Producto;

class RevisarOfertas extends Command
{
    protected $signature = 'revisar:ofertas';
    protected $description = 'Revisa y actualiza las ofertas';

    public function handle()
    {
        // Revisar ofertas
        $ofertas = Oferta::all();
        $totalOfertas = $ofertas->count();
        Log::info("Se encontraron $totalOfertas ofertas");

        foreach ($ofertas as $oferta) {
            $producto = Producto::withTrashed()->where('oferta_id', $oferta->id)->first();
            $nombre = $producto->nombre_producto;
            Log::info("La oferta {$oferta->id} está aplicada a $nombre productos");

            // Actualizar el estado de la oferta si ya expiró
            $hoy = now();

            if ($oferta->fecha_inicio >= $hoy && $oferta->fecha_fin > $hoy) {
                if ($oferta->estado_oferta !== 1) {
                    $oferta->estado_oferta = 1;
                    $oferta->save();
                    Log::info("Se actualizó el estado de la oferta {$oferta->id} a 1");
                }
            }

            if ($oferta->fecha_fin <= $hoy) {
                // La oferta ya no es válida
                $producto->oferta_id = null;
                Log::info("La oferta {$oferta->id} ya no es válida y se removerá del producto {$nombre}");
                $producto->oferta_id = null;
                $producto->save();
                $oferta->delete();
            }

            if ($oferta->fecha_fin < $hoy && !$producto) {
                $oferta->delete();
                Log::info("Se eliminó la oferta {$oferta->id} porque ya expiró y no está asociada a ningún producto");
            }           
        }
    }
}
