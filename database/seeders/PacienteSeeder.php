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
                'preferencias_alimentarias' => "Pisa",
                'motivo_hospitalizacion' => "Pulmones",
                'nuhsa' => "AN2748382739",
                'user_id' => 5,
                'dietista_id' => 3,


            ],
            [
                'alergias_alimentarias' => "Queso",
                'preferencias_alimentarias' => "Pasta",
                'motivo_hospitalizacion' => "Pecho",
                'nuhsa' => "AN1728495834",
                'user_id' => 6,
                'dietista_id' => 4,

            ],
        ]);
    }
}
