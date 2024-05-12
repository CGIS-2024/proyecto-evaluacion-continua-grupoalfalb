<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoriaplato extends Model
{
    protected $fillable = ['nombre'];

    public function platos(){
        return $this->hasMany(Plato::class);
    }
}
