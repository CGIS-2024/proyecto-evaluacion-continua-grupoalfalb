<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $fillable = ['tipo', 'nombre',  'alergenos', 'grasas', 'carbohidratos', 'proteinas', 'sodio', 'contenido_energetico'];
    
    public function menus(){
        return $this->belongsToMany(Menu::class)->using(MenuPlato::class)->withPivot('comida');
    }

}
