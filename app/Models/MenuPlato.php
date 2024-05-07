<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MenuPlato extends Pivot
{

    protected $casts = [
        //No ponemos el tipo enum, porq no hay que castearlo

    ];
}
