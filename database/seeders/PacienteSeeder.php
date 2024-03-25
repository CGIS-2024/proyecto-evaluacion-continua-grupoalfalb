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
                'preferencias_alimentarias' => 'Pisa',
                'motivo_hospitalizacion' => 'Pulmones',
                'nuhsa' => '197503210123',

            ],
            [
                'alergias_alimentarias' => "Huevo",
                'preferencias_alimentarias' => 'Pisa',
                'motivo_hospitalizacion' => 'Pulmones',
                'nuhsa' => '197503210123'
            ],
        ]);
    }
}
