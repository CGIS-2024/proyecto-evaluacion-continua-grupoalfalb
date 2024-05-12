<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


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
                'descripcion' => "Filete de salmón al horno acompañado de una selección de verduras asadas, como zanahorias, brócoli y pimientos.",
                'ingredientes' => "Filete de salmón, zanahorias, brócoli, pimientos, aceite de oliva, sal, pimienta",
                'peso' => "200",
                'calorias' => "250",
                'proteinas' => "20",
                'grasas' => "15",
                'carbohidratos' => "10",
                'fibra' => "4",
                'azucares' => "3",
                'alergenos' => "pescado",
                'categoriaplato_id' => 1

            ],
            [
                'nombre' => "Arroz con pollo",
                'descripcion' => "Arroz cocido con trozos de pollo tierno y verduras mixtas.",
                'ingredientes' => "Arroz, pollo, zanahorias, guisantes, cebolla, aceite de oliva, sal, especias",
                'peso' => "250",
                'calorias' => "300",
                'proteinas' => "20",
                'grasas' => "10",
                'carbohidratos' => "35",
                'fibra' => "3",
                'azucares' => "2",
                'alergenos' => "gluten",
                'categoriaplato_id' => 1

            ],
            [
                'nombre' => "Sopa de verduras",
                'descripcion' => "Sopa casera con una variedad de verduras frescas, como zanahorias, calabacines, puerros y judías verdes.",
                'ingredientes' => "Zanahorias, calabacines, puerros, judías verdes, caldo de verduras, sal, pimienta",
                'peso' => "200",
                'calorias' => "120",
                'proteinas' => "5",
                'grasas' => "3",
                'carbohidratos' => "20",
                'fibra' => "6",
                'azucares' => "5",
                'alergenos' => "ninguno",
                'categoriaplato_id' => 2
            ],
            [
                'nombre' => "Pechuga de pollo a la plancha",
                'descripcion' => "Pechuga de pollo a la plancha sazonada con hierbas frescas, servida con una porción de arroz integral y brócoli al vapor.",
                'ingredientes' => "Pechuga de pollo, arroz integral, brócoli, aceite de oliva, hierbas frescas, sal, pimienta",
                'peso' => "250",
                'calorias' => "300",
                'proteinas' => "25",
                'grasas' => "8",
                'carbohidratos' => "35",
                'fibra' => "4",
                'azucares' => "2",
                'alergenos' => "ninguno",
                'categoriaplato_id' => 1
            ],
            [
                'nombre' => "Ensalada de quinoa",
                'descripcion' => "Ensalada ligera y nutritiva con quinoa, aguacate, tomate, pepino, espinacas frescas y aderezo de limón.",
                'ingredientes' => "Quinoa, aguacate, tomate, pepino, espinacas, limón, aceite de oliva, sal, pimienta",
                'peso' => "180",
                'calorias' => "250",
                'proteinas' => "8",
                'grasas' => "10",
                'carbohidratos' => "30",
                'fibra' => "5",
                'azucares' => "3",
                'alergenos' => "ninguno",
                'categoriaplato_id' => 1
            ],
            [
                'nombre' => "Puré de patatas",
                'descripcion' => "Puré suave de patatas cocidas y machacadas con un poco de leche y mantequilla, servido caliente.",
                'ingredientes' => "Patatas, leche, mantequilla, sal, pimienta",
                'peso' => "150",
                'calorias' => "180",
                'proteinas' => "3",
                'grasas' => "6",
                'carbohidratos' => "25",
                'fibra' => "2",
                'azucares' => "2",
                'alergenos' => "lácteos",
                'categoriaplato_id' => 2
            ],





        ]);
    }
}
