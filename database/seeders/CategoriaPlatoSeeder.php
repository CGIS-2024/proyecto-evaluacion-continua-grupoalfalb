<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriaplatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categoriaplatos')->insert([
            [
                'nombre' => "Primer Plato",
            ],
            [
                'nombre' => "Segundo Plato",
            ],
            [
                'nombre' => "Postre",
            ],
        ]);
    }
}
