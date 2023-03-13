<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categorias')->delete();
        
        \DB::table('categorias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre_categoria' => 'Ornamentales',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre_categoria' => 'Plantas de Interior',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre_categoria' => 'Plantas de Exterior',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre_categoria' => 'Suculentas',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre_categoria' => 'Árboles Frutales',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre_categoria' => 'Maceteros',
            ),
            6 => 
            array (
                'id' => 7,
                'nombre_categoria' => 'Tierra de Hojas',
            ),
            7 => 
            array (
                'id' => 8,
                'nombre_categoria' => 'Accesorios',
            ),
        ));
        
        
    }
}