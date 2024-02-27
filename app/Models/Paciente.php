<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = ['alergias_alimentarias', 'preferencias_alimentarias', 'motivo_hospitalizacion', 'nuhsa',];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
