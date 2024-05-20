<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MenuPaciente extends Pivot
{

    protected $casts = [
        'fecha' => 'datetime:Y/m/d',
        'tipo'=> 'String',
    ];
}
