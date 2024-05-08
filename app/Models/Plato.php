<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $fillable = ['nombre',  'alergenos', 'grasas', 'carbohidratos', 'proteinas', 'fibra', 'calorias', 'azucares', 'peso', 'ingredientes', 'descripcion'];

    public function menus(){
        return $this->belongsToMany(Menu::class)->using(MenuPlato::class)->withPivot('categoriaplato_id');
    }


}
