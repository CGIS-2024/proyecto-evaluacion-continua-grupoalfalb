<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriaPlatoSeeder extends Seeder
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
