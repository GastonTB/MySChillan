<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ComunasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('comunas')->delete();
        
        \DB::table('comunas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre_comuna' => 'Arica',
                'region_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre_comuna' => 'Camarones',
                'region_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre_comuna' => 'General Lagos',
                'region_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre_comuna' => 'Putre',
                'region_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'nombre_comuna' => 'Alto Hospicio',
                'region_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'nombre_comuna' => 'Iquique',
                'region_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'nombre_comuna' => 'Camiña',
                'region_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'nombre_comuna' => 'Colchane',
                'region_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'nombre_comuna' => 'Huara',
                'region_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'nombre_comuna' => 'Pica',
                'region_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'nombre_comuna' => 'Pozo Almonte',
                'region_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'nombre_comuna' => 'Antofagasta',
                'region_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'nombre_comuna' => 'Mejillones',
                'region_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'nombre_comuna' => 'Sierra Gorda',
                'region_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'nombre_comuna' => 'Taltal',
                'region_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'nombre_comuna' => 'Calama',
                'region_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'nombre_comuna' => 'Ollague',
                'region_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'nombre_comuna' => 'San Pedro de Atacama',
                'region_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'nombre_comuna' => 'María Elena',
                'region_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'nombre_comuna' => 'Tocopilla',
                'region_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'nombre_comuna' => 'Chañaral',
                'region_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'nombre_comuna' => 'Diego de Almagro',
                'region_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'nombre_comuna' => 'Caldera',
                'region_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'nombre_comuna' => 'Copiapó',
                'region_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'nombre_comuna' => 'Tierra Amarilla',
                'region_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'nombre_comuna' => 'Alto del Carmen',
                'region_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'nombre_comuna' => 'Freirina',
                'region_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'nombre_comuna' => 'Huasco',
                'region_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'nombre_comuna' => 'Vallenar',
                'region_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'nombre_comuna' => 'Canela',
                'region_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'nombre_comuna' => 'Illapel',
                'region_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'nombre_comuna' => 'Los Vilos',
                'region_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'nombre_comuna' => 'Salamanca',
                'region_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'nombre_comuna' => 'Andacollo',
                'region_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'nombre_comuna' => 'Coquimbo',
                'region_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'nombre_comuna' => 'La Higuera',
                'region_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'nombre_comuna' => 'La Serena',
                'region_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'nombre_comuna' => 'Paihuaco',
                'region_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'nombre_comuna' => 'Vicuña',
                'region_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'nombre_comuna' => 'Combarbalá',
                'region_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'nombre_comuna' => 'Monte Patria',
                'region_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'nombre_comuna' => 'Ovalle',
                'region_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'nombre_comuna' => 'Punitaqui',
                'region_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'nombre_comuna' => 'Río Hurtado',
                'region_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'nombre_comuna' => 'Isla de Pascua',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'nombre_comuna' => 'Calle Larga',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'nombre_comuna' => 'Los Andes',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'nombre_comuna' => 'Rinconada',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'nombre_comuna' => 'San Esteban',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'nombre_comuna' => 'La Ligua',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'nombre_comuna' => 'Papudo',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'nombre_comuna' => 'Petorca',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'nombre_comuna' => 'Zapallar',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'nombre_comuna' => 'Hijuelas',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'nombre_comuna' => 'La Calera',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'nombre_comuna' => 'La Cruz',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'nombre_comuna' => 'Limache',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'nombre_comuna' => 'Nogales',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'nombre_comuna' => 'Olmué',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'nombre_comuna' => 'Quillota',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'nombre_comuna' => 'Algarrobo',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'nombre_comuna' => 'Cartagena',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'nombre_comuna' => 'El Quisco',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'nombre_comuna' => 'El Tabo',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'nombre_comuna' => 'San Antonio',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'nombre_comuna' => 'Santo Domingo',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'nombre_comuna' => 'Catemu',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'nombre_comuna' => 'Llaillay',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'nombre_comuna' => 'Panquehue',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'nombre_comuna' => 'Putaendo',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'nombre_comuna' => 'San Felipe',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'nombre_comuna' => 'Santa María',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'nombre_comuna' => 'Casablanca',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'nombre_comuna' => 'Concón',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'nombre_comuna' => 'Juan Fernández',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'nombre_comuna' => 'Puchuncaví',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'nombre_comuna' => 'Quilpué',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'nombre_comuna' => 'Quintero',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'nombre_comuna' => 'Valparaíso',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'nombre_comuna' => 'Villa Alemana',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'nombre_comuna' => 'Viña del Mar',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'nombre_comuna' => 'Colina',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'nombre_comuna' => 'Lampa',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'nombre_comuna' => 'Tiltil',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'nombre_comuna' => 'Pirque',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'nombre_comuna' => 'Puente Alto',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'nombre_comuna' => 'San José de Maipo',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'nombre_comuna' => 'Buin',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'nombre_comuna' => 'Calera de Tango',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'nombre_comuna' => 'Paine',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'nombre_comuna' => 'San Bernardo',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'nombre_comuna' => 'Alhué',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'nombre_comuna' => 'Curacaví',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'nombre_comuna' => 'María Pinto',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'nombre_comuna' => 'Melipilla',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'nombre_comuna' => 'San Pedro',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'nombre_comuna' => 'Cerrillos',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'nombre_comuna' => 'Cerro Navia',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'nombre_comuna' => 'Conchalí',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'nombre_comuna' => 'El Bosque',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 101,
                'nombre_comuna' => 'Estación Central',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 102,
                'nombre_comuna' => 'Huechuraba',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 103,
                'nombre_comuna' => 'Independencia',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 104,
                'nombre_comuna' => 'La Cisterna',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 105,
                'nombre_comuna' => 'La Granja',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 106,
                'nombre_comuna' => 'La Florida',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 107,
                'nombre_comuna' => 'La Pintana',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 108,
                'nombre_comuna' => 'La Reina',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 109,
                'nombre_comuna' => 'Las Condes',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 110,
                'nombre_comuna' => 'Lo Barnechea',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 111,
                'nombre_comuna' => 'Lo Espejo',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 112,
                'nombre_comuna' => 'Lo Prado',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 113,
                'nombre_comuna' => 'Macul',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 114,
                'nombre_comuna' => 'Maipú',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 115,
                'nombre_comuna' => 'Ñuñoa',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 116,
                'nombre_comuna' => 'Pedro Aguirre Cerda',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 117,
                'nombre_comuna' => 'Peñalolén',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 118,
                'nombre_comuna' => 'Providencia',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 119,
                'nombre_comuna' => 'Pudahuel',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 120,
                'nombre_comuna' => 'Quilicura',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 121,
                'nombre_comuna' => 'Quinta Normal',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 122,
                'nombre_comuna' => 'Recoleta',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 123,
                'nombre_comuna' => 'Renca',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 124,
                'nombre_comuna' => 'San Miguel',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 125,
                'nombre_comuna' => 'San Joaquín',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 126,
                'nombre_comuna' => 'San Ramón',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 127,
                'nombre_comuna' => 'Santiago',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 128,
                'nombre_comuna' => 'Vitacura',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 129,
                'nombre_comuna' => 'El Monte',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 130,
                'nombre_comuna' => 'Isla de Maipo',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 131,
                'nombre_comuna' => 'Padre Hurtado',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 132,
                'nombre_comuna' => 'Peñaflor',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 133,
                'nombre_comuna' => 'Talagante',
                'region_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 134,
                'nombre_comuna' => 'Codegua',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 135,
                'nombre_comuna' => 'Coínco',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 136,
                'nombre_comuna' => 'Coltauco',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 137,
                'nombre_comuna' => 'Doñihue',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 138,
                'nombre_comuna' => 'Graneros',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 139,
                'nombre_comuna' => 'Las Cabras',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 140,
                'nombre_comuna' => 'Machalí',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 141,
                'nombre_comuna' => 'Malloa',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 142,
                'nombre_comuna' => 'Mostazal',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 143,
                'nombre_comuna' => 'Olivar',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 144,
                'nombre_comuna' => 'Peumo',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 145,
                'nombre_comuna' => 'Pichidegua',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 146,
                'nombre_comuna' => 'Quinta de Tilcoco',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 147,
                'nombre_comuna' => 'Rancagua',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 148,
                'nombre_comuna' => 'Rengo',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 149,
                'nombre_comuna' => 'Requínoa',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 150,
                'nombre_comuna' => 'San Vicente de Tagua Tagua',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 151,
                'nombre_comuna' => 'La Estrella',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 152,
                'nombre_comuna' => 'Litueche',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 153,
                'nombre_comuna' => 'Marchihue',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 154,
                'nombre_comuna' => 'Navidad',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 155,
                'nombre_comuna' => 'Peredones',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 156,
                'nombre_comuna' => 'Pichilemu',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 157,
                'nombre_comuna' => 'Chépica',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 158,
                'nombre_comuna' => 'Chimbarongo',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 159,
                'nombre_comuna' => 'Lolol',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 160,
                'nombre_comuna' => 'Nancagua',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 161,
                'nombre_comuna' => 'Palmilla',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 162,
                'nombre_comuna' => 'Peralillo',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 163,
                'nombre_comuna' => 'Placilla',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 164,
                'nombre_comuna' => 'Pumanque',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 165,
                'nombre_comuna' => 'San Fernando',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 166,
                'nombre_comuna' => 'Santa Cruz',
                'region_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 167,
                'nombre_comuna' => 'Cauquenes',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 168,
                'nombre_comuna' => 'Chanco',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 169,
                'nombre_comuna' => 'Pelluhue',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 170,
                'nombre_comuna' => 'Curicó',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 171,
                'nombre_comuna' => 'Hualañé',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 172,
                'nombre_comuna' => 'Licantén',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 173,
                'nombre_comuna' => 'Molina',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 174,
                'nombre_comuna' => 'Rauco',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 175,
                'nombre_comuna' => 'Romeral',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 176,
                'nombre_comuna' => 'Sagrada Familia',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 177,
                'nombre_comuna' => 'Teno',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 178,
                'nombre_comuna' => 'Vichuquén',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 179,
                'nombre_comuna' => 'Colbún',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 180,
                'nombre_comuna' => 'Linares',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 181,
                'nombre_comuna' => 'Longaví',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 182,
                'nombre_comuna' => 'Parral',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 183,
                'nombre_comuna' => 'Retiro',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 184,
                'nombre_comuna' => 'San Javier',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 185,
                'nombre_comuna' => 'Villa Alegre',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 186,
                'nombre_comuna' => 'Yerbas Buenas',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 187,
                'nombre_comuna' => 'Constitución',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 188,
                'nombre_comuna' => 'Curepto',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 189,
                'nombre_comuna' => 'Empedrado',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 190,
                'nombre_comuna' => 'Maule',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 191,
                'nombre_comuna' => 'Pelarco',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 192,
                'nombre_comuna' => 'Pencahue',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 193,
                'nombre_comuna' => 'Río Claro',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 194,
                'nombre_comuna' => 'San Clemente',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 195,
                'nombre_comuna' => 'San Rafael',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 196,
                'nombre_comuna' => 'Talca',
                'region_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 197,
                'nombre_comuna' => 'Bulnes',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 198,
                'nombre_comuna' => 'Chillán',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 199,
                'nombre_comuna' => 'Chillán Viejo',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 200,
                'nombre_comuna' => 'Cobquecura',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 201,
                'nombre_comuna' => 'Coelemu',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 202,
                'nombre_comuna' => 'Coihueco',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 203,
                'nombre_comuna' => 'El Carmen',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            203 => 
            array (
                'id' => 204,
                'nombre_comuna' => 'Ninhue',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 205,
                'nombre_comuna' => 'Ñiquen',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 206,
                'nombre_comuna' => 'Pemuco',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 207,
                'nombre_comuna' => 'Pinto',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 208,
                'nombre_comuna' => 'Portezuelo',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            208 => 
            array (
                'id' => 209,
                'nombre_comuna' => 'Quirihue',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            209 => 
            array (
                'id' => 210,
                'nombre_comuna' => 'Ránquil',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            210 => 
            array (
                'id' => 211,
                'nombre_comuna' => 'Treguaco',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            211 => 
            array (
                'id' => 212,
                'nombre_comuna' => 'Quillón',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            212 => 
            array (
                'id' => 213,
                'nombre_comuna' => 'San Carlos',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            213 => 
            array (
                'id' => 214,
                'nombre_comuna' => 'San Fabián',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            214 => 
            array (
                'id' => 215,
                'nombre_comuna' => 'San Ignacio',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            215 => 
            array (
                'id' => 216,
                'nombre_comuna' => 'San Nicolás',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            216 => 
            array (
                'id' => 217,
                'nombre_comuna' => 'Yungay',
                'region_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            217 => 
            array (
                'id' => 218,
                'nombre_comuna' => 'Arauco',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            218 => 
            array (
                'id' => 219,
                'nombre_comuna' => 'Cañete',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            219 => 
            array (
                'id' => 220,
                'nombre_comuna' => 'Contulmo',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            220 => 
            array (
                'id' => 221,
                'nombre_comuna' => 'Curanilahue',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            221 => 
            array (
                'id' => 222,
                'nombre_comuna' => 'Lebu',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            222 => 
            array (
                'id' => 223,
                'nombre_comuna' => 'Los Álamos',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            223 => 
            array (
                'id' => 224,
                'nombre_comuna' => 'Tirúa',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            224 => 
            array (
                'id' => 225,
                'nombre_comuna' => 'Alto Biobío',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            225 => 
            array (
                'id' => 226,
                'nombre_comuna' => 'Antuco',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            226 => 
            array (
                'id' => 227,
                'nombre_comuna' => 'Cabrero',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            227 => 
            array (
                'id' => 228,
                'nombre_comuna' => 'Laja',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            228 => 
            array (
                'id' => 229,
                'nombre_comuna' => 'Los Ángeles',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            229 => 
            array (
                'id' => 230,
                'nombre_comuna' => 'Mulchén',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            230 => 
            array (
                'id' => 231,
                'nombre_comuna' => 'Nacimiento',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            231 => 
            array (
                'id' => 232,
                'nombre_comuna' => 'Negrete',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            232 => 
            array (
                'id' => 233,
                'nombre_comuna' => 'Quilaco',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            233 => 
            array (
                'id' => 234,
                'nombre_comuna' => 'Quilleco',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            234 => 
            array (
                'id' => 235,
                'nombre_comuna' => 'San Rosendo',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            235 => 
            array (
                'id' => 236,
                'nombre_comuna' => 'Santa Bárbara',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            236 => 
            array (
                'id' => 237,
                'nombre_comuna' => 'Tucapel',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            237 => 
            array (
                'id' => 238,
                'nombre_comuna' => 'Yumbel',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            238 => 
            array (
                'id' => 239,
                'nombre_comuna' => 'Chiguayante',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            239 => 
            array (
                'id' => 240,
                'nombre_comuna' => 'Concepción',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            240 => 
            array (
                'id' => 241,
                'nombre_comuna' => 'Coronel',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            241 => 
            array (
                'id' => 242,
                'nombre_comuna' => 'Florida',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            242 => 
            array (
                'id' => 243,
                'nombre_comuna' => 'Hualpén',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            243 => 
            array (
                'id' => 244,
                'nombre_comuna' => 'Hualqui',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            244 => 
            array (
                'id' => 245,
                'nombre_comuna' => 'Lota',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            245 => 
            array (
                'id' => 246,
                'nombre_comuna' => 'Penco',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            246 => 
            array (
                'id' => 247,
                'nombre_comuna' => 'San Pedro de La Paz',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            247 => 
            array (
                'id' => 248,
                'nombre_comuna' => 'Santa Juana',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            248 => 
            array (
                'id' => 249,
                'nombre_comuna' => 'Talcahuano',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            249 => 
            array (
                'id' => 250,
                'nombre_comuna' => 'Tomé',
                'region_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            250 => 
            array (
                'id' => 251,
                'nombre_comuna' => 'Carahue',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            251 => 
            array (
                'id' => 252,
                'nombre_comuna' => 'Cholchol',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            252 => 
            array (
                'id' => 253,
                'nombre_comuna' => 'Cunco',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            253 => 
            array (
                'id' => 254,
                'nombre_comuna' => 'Curarrehue',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            254 => 
            array (
                'id' => 255,
                'nombre_comuna' => 'Freire',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            255 => 
            array (
                'id' => 256,
                'nombre_comuna' => 'Galvarino',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            256 => 
            array (
                'id' => 257,
                'nombre_comuna' => 'Gorbea',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            257 => 
            array (
                'id' => 258,
                'nombre_comuna' => 'Lautaro',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            258 => 
            array (
                'id' => 259,
                'nombre_comuna' => 'Loncoche',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            259 => 
            array (
                'id' => 260,
                'nombre_comuna' => 'Melipeuco',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            260 => 
            array (
                'id' => 261,
                'nombre_comuna' => 'Nueva Imperial',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            261 => 
            array (
                'id' => 262,
                'nombre_comuna' => 'Padre Las Casas',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            262 => 
            array (
                'id' => 263,
                'nombre_comuna' => 'Perquenco',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            263 => 
            array (
                'id' => 264,
                'nombre_comuna' => 'Pitrufquén',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            264 => 
            array (
                'id' => 265,
                'nombre_comuna' => 'Pucón',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            265 => 
            array (
                'id' => 266,
                'nombre_comuna' => 'Saavedra',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            266 => 
            array (
                'id' => 267,
                'nombre_comuna' => 'Temuco',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            267 => 
            array (
                'id' => 268,
                'nombre_comuna' => 'Teodoro Schmidt',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            268 => 
            array (
                'id' => 269,
                'nombre_comuna' => 'Toltén',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            269 => 
            array (
                'id' => 270,
                'nombre_comuna' => 'Vilcún',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            270 => 
            array (
                'id' => 271,
                'nombre_comuna' => 'Villarrica',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            271 => 
            array (
                'id' => 272,
                'nombre_comuna' => 'Angol',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            272 => 
            array (
                'id' => 273,
                'nombre_comuna' => 'Collipulli',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            273 => 
            array (
                'id' => 274,
                'nombre_comuna' => 'Curacautín',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            274 => 
            array (
                'id' => 275,
                'nombre_comuna' => 'Ercilla',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            275 => 
            array (
                'id' => 276,
                'nombre_comuna' => 'Lonquimay',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            276 => 
            array (
                'id' => 277,
                'nombre_comuna' => 'Los Sauces',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            277 => 
            array (
                'id' => 278,
                'nombre_comuna' => 'Lumaco',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            278 => 
            array (
                'id' => 279,
                'nombre_comuna' => 'Purén',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            279 => 
            array (
                'id' => 280,
                'nombre_comuna' => 'Renaico',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            280 => 
            array (
                'id' => 281,
                'nombre_comuna' => 'Traiguén',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            281 => 
            array (
                'id' => 282,
                'nombre_comuna' => 'Victoria',
                'region_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            282 => 
            array (
                'id' => 283,
                'nombre_comuna' => 'Corral',
                'region_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            283 => 
            array (
                'id' => 284,
                'nombre_comuna' => 'Lanco',
                'region_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            284 => 
            array (
                'id' => 285,
                'nombre_comuna' => 'Los Lagos',
                'region_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            285 => 
            array (
                'id' => 286,
                'nombre_comuna' => 'Máfil',
                'region_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            286 => 
            array (
                'id' => 287,
                'nombre_comuna' => 'Mariquina',
                'region_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            287 => 
            array (
                'id' => 288,
                'nombre_comuna' => 'Paillaco',
                'region_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            288 => 
            array (
                'id' => 289,
                'nombre_comuna' => 'Panguipulli',
                'region_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            289 => 
            array (
                'id' => 290,
                'nombre_comuna' => 'Valdivia',
                'region_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            290 => 
            array (
                'id' => 291,
                'nombre_comuna' => 'Futrono',
                'region_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            291 => 
            array (
                'id' => 292,
                'nombre_comuna' => 'La Unión',
                'region_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            292 => 
            array (
                'id' => 293,
                'nombre_comuna' => 'Lago Ranco',
                'region_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            293 => 
            array (
                'id' => 294,
                'nombre_comuna' => 'Río Bueno',
                'region_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            294 => 
            array (
                'id' => 295,
                'nombre_comuna' => 'Ancud',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            295 => 
            array (
                'id' => 296,
                'nombre_comuna' => 'Castro',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            296 => 
            array (
                'id' => 297,
                'nombre_comuna' => 'Chonchi',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            297 => 
            array (
                'id' => 298,
                'nombre_comuna' => 'Curaco de Vélez',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            298 => 
            array (
                'id' => 299,
                'nombre_comuna' => 'Dalcahue',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            299 => 
            array (
                'id' => 300,
                'nombre_comuna' => 'Puqueldón',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            300 => 
            array (
                'id' => 301,
                'nombre_comuna' => 'Queilén',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            301 => 
            array (
                'id' => 302,
                'nombre_comuna' => 'Quemchi',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            302 => 
            array (
                'id' => 303,
                'nombre_comuna' => 'Quellón',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            303 => 
            array (
                'id' => 304,
                'nombre_comuna' => 'Quinchao',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            304 => 
            array (
                'id' => 305,
                'nombre_comuna' => 'Calbuco',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            305 => 
            array (
                'id' => 306,
                'nombre_comuna' => 'Cochamó',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            306 => 
            array (
                'id' => 307,
                'nombre_comuna' => 'Fresia',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            307 => 
            array (
                'id' => 308,
                'nombre_comuna' => 'Frutillar',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            308 => 
            array (
                'id' => 309,
                'nombre_comuna' => 'Llanquihue',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            309 => 
            array (
                'id' => 310,
                'nombre_comuna' => 'Los Muermos',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            310 => 
            array (
                'id' => 311,
                'nombre_comuna' => 'Maullín',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            311 => 
            array (
                'id' => 312,
                'nombre_comuna' => 'Puerto Montt',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            312 => 
            array (
                'id' => 313,
                'nombre_comuna' => 'Puerto Varas',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            313 => 
            array (
                'id' => 314,
                'nombre_comuna' => 'Osorno',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            314 => 
            array (
                'id' => 315,
                'nombre_comuna' => 'Puero Octay',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            315 => 
            array (
                'id' => 316,
                'nombre_comuna' => 'Purranque',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            316 => 
            array (
                'id' => 317,
                'nombre_comuna' => 'Puyehue',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            317 => 
            array (
                'id' => 318,
                'nombre_comuna' => 'Río Negro',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            318 => 
            array (
                'id' => 319,
                'nombre_comuna' => 'San Juan de la Costa',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            319 => 
            array (
                'id' => 320,
                'nombre_comuna' => 'San Pablo',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            320 => 
            array (
                'id' => 321,
                'nombre_comuna' => 'Chaitén',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            321 => 
            array (
                'id' => 322,
                'nombre_comuna' => 'Futaleufú',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            322 => 
            array (
                'id' => 323,
                'nombre_comuna' => 'Hualaihué',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            323 => 
            array (
                'id' => 324,
                'nombre_comuna' => 'Palena',
                'region_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            324 => 
            array (
                'id' => 325,
                'nombre_comuna' => 'Aisén',
                'region_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            325 => 
            array (
                'id' => 326,
                'nombre_comuna' => 'Cisnes',
                'region_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            326 => 
            array (
                'id' => 327,
                'nombre_comuna' => 'Guaitecas',
                'region_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            327 => 
            array (
                'id' => 328,
                'nombre_comuna' => 'Cochrane',
                'region_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            328 => 
            array (
                'id' => 329,
                'nombre_comuna' => 'O\'higgins',
                'region_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            329 => 
            array (
                'id' => 330,
                'nombre_comuna' => 'Tortel',
                'region_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            330 => 
            array (
                'id' => 331,
                'nombre_comuna' => 'Coihaique',
                'region_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            331 => 
            array (
                'id' => 332,
                'nombre_comuna' => 'Lago Verde',
                'region_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            332 => 
            array (
                'id' => 333,
                'nombre_comuna' => 'Chile Chico',
                'region_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            333 => 
            array (
                'id' => 334,
                'nombre_comuna' => 'Río Ibáñez',
                'region_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            334 => 
            array (
                'id' => 335,
                'nombre_comuna' => 'Antártica',
                'region_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            335 => 
            array (
                'id' => 336,
                'nombre_comuna' => 'Cabo de Hornos',
                'region_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            336 => 
            array (
                'id' => 337,
                'nombre_comuna' => 'Laguna Blanca',
                'region_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            337 => 
            array (
                'id' => 338,
                'nombre_comuna' => 'Punta Arenas',
                'region_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            338 => 
            array (
                'id' => 339,
                'nombre_comuna' => 'Río Verde',
                'region_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            339 => 
            array (
                'id' => 340,
                'nombre_comuna' => 'San Gregorio',
                'region_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            340 => 
            array (
                'id' => 341,
                'nombre_comuna' => 'Porvenir',
                'region_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            341 => 
            array (
                'id' => 342,
                'nombre_comuna' => 'Primavera',
                'region_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            342 => 
            array (
                'id' => 343,
                'nombre_comuna' => 'Timaukel',
                'region_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            343 => 
            array (
                'id' => 344,
                'nombre_comuna' => 'Natales',
                'region_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            344 => 
            array (
                'id' => 345,
                'nombre_comuna' => 'Torres del Paine',
                'region_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            345 => 
            array (
                'id' => 346,
                'nombre_comuna' => 'Cabildo',
                'region_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}