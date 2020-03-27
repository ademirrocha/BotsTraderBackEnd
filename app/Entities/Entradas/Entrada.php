<?php

namespace App\Entities\Entradas;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $fillable = [
        'ativo_id', 'trader', 'data'
    ];
}
