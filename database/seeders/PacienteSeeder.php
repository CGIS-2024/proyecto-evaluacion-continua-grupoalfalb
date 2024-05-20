<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('pacientes')->insert([
            [
                'alergias_alimentarias' => "Huevo",
                'preferencias_alimentarias' => "Pasta en general y verduras como la lechuga o el tomate. De postre fruta",
                'motivo_hospitalizacion' => "Apendicitis",
                'nuhsa' => "AN2748382739",
                'user_id' => 5,
                'dietista_id' => 1,


            ],
            [
                'alergias_alimentarias' => "Lactosa",
                'preferencias_alimentarias' => "Carne a la plancha si puede ser pollo. De postre algo dulce que no tenga mucha azúcar",
                'motivo_hospitalizacion' => "Fractura de costilla",
                'nuhsa' => "AN1728495834",
                'user_id' => 6,
                'dietista_id' => 2,

            ],
            [
                'alergias_alimentarias' => "Nada",
                'preferencias_alimentarias' => "Hamburguesa con patatas. De postre helado.",
                'motivo_hospitalizacion' => "Infección de la vesícula",
                'nuhsa' => "AN8679034339",
                'user_id' => 9,
                'dietista_id' => 3,


            ],
            [
                'alergias_alimentarias' => "Gluten",
                'preferencias_alimentarias' => "Verduras con pollo. De postre yogur de coco.",
                'motivo_hospitalizacion' => "Fractura de clavicula",
                'nuhsa' => "AN7263827382",
                'user_id' => 10,
                'dietista_id' => 4,


            ],
            [
                'alergias_alimentarias' => "Nada",
                'preferencias_alimentarias' => "Lentejas. De postre fruta.",
                'motivo_hospitalizacion' => "Fimosis",
                'nuhsa' => "AN7283726152",
                'user_id' => 11,
                'dietista_id' => 4,


            ],
        ]);

        DB::table('menu_paciente')->insert([
            [
                'paciente_id' => 1,
                'menu_id' => 1,
                'fecha' => '2025-05-07',
                'tipo' => 'Almuerzo',


            ],
            [
                'paciente_id' => 2,
                'menu_id' => 2,
                'fecha' => '2025-05-07',
                'tipo' => 'Cena',

            ],

        ]);
    }
}
