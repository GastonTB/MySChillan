<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RegionesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('regiones')->delete();
        
        \DB::table('regiones')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre_region' => 'Arica y Parinacota',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre_region' => 'Tarapacá',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre_region' => 'Antofagasta',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre_region' => 'Atacama',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'nombre_region' => 'Coquimbo',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'nombre_region' => 'Valparaiso',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'nombre_region' => 'Metropolitana de Santiago',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'nombre_region' => 'Libertador General Bernardo O\'Higgins',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'nombre_region' => 'Maule',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'nombre_region' => 'Ñuble',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'nombre_region' => 'Biobío',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'nombre_region' => 'La Araucanía',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'nombre_region' => 'Los Ríos',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'nombre_region' => 'Los Lagos',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'nombre_region' => 'Aisén del General Carlos Ibáñez del Campo',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'nombre_region' => 'Magallanes y de la Antártica Chilena',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}