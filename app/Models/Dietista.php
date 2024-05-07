<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dietista extends Model
{
    protected $fillable = ['nuhsa', 'fecha_contratacion'];

    public function menus(){
        return $this->hasMany(Menu::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pacientes(){
        return $this->hasMany(Paciente::class);
    }
}

