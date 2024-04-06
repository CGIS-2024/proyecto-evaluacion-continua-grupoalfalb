<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MenuPlato extends Pivot
{

    protected $casts = [
        //Por que ponemos inicio? si no tenemos ese atributo.. yo creo que no tenemos que castear nada
        //'inicio' => 'datetime:Y-m-d',
    ];
}
