<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['instrucciones_especificas', 'fecha'];

    public function dietista(){
        return $this->belongsTo(Dietista::class);
    }
    protected $casts = [
        'fecha' => 'datetime:Y-m-d H:i',
    ];
}
