<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['instrucciones_especificas','dietista_id'];

    public function dietista(){
        return $this->belongsTo(Dietista::class);
    }
    public function platos(){
        return $this->belongsToMany(Plato::class)->using(MenuPlato::class);
    }
    public function pacientes(){
        return $this->belongsToMany(Paciente::class)->using(MenuPaciente::class)->withPivot('fecha','tipo');
    }





}
