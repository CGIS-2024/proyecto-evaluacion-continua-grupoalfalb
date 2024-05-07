<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaPlato extends Model
{
    protected $fillable = ['nombre'];

    public function menus(){
        return $this->hasMany(Menu::class);
    }
}
