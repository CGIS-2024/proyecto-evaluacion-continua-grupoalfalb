<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('platos')->insert([
            [
                'nombre' => "Salmón al horno con verduras",
                'tipo' => "Plato Principal",
                'descripcion' => "Filete de salmón al horno acompañado de una selección de verduras asadas, como zanahorias, brócoli y pimientos.",
                'ingredientes' => "Filete de salmón, zanahorias, brócoli, pimientos, aceite de oliva, sal, pimienta",
                'peso' => "200",
                'calorias' => "250",
                'proteinas' => "20",
                'grasas' => "15",
                'carbohidratos' => "10",
                'fibra' => "4",
                'azucares' => "3",
                'alergenos' => "pescado"
            ],
            [
                'nombre' => "Arroz con pollo",
                'tipo' => "Plato Principal",
                'descripcion' => "Arroz cocido con trozos de pollo tierno y verduras mixtas.",
                'ingredientes' => "Arroz, pollo, zanahorias, guisantes, cebolla, aceite de oliva, sal, especias",
                'peso' => "250",
                'calorias' => "300",
                'proteinas' => "20",
                'grasas' => "10",
                'carbohidratos' => "35",
                'fibra' => "3",
                'azucares' => "2",
                'alergenos' => "gluten"
            ],
        ]);
    }
}