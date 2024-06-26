<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = ['alergias_alimentarias', 'preferencias_alimentarias', 'motivo_hospitalizacion', 'nuhsa', 'dietista_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function dietista(){
        return $this->belongsTo(Dietista::class);
    }
    public function menus(){
        return $this->belongsToMany(Menu::class)->using(MenuPaciente::class)->withPivot('fecha','tipo');
    }
}
