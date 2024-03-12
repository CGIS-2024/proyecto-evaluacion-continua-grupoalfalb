<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dietista extends Model
{
    protected $fillable = ['nusha', 'fecha_contratacion'];

    public function menus(){
        return $this->hasMany(Menu::class);
    }
}
