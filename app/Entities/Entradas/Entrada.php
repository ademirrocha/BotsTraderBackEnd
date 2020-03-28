<?php

namespace App\Entities\Entradas;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Ativos\Ativo;

class Entrada extends Model
{
    protected $fillable = [
        'ativo_id', 'trader', 'data'
    ];

    public function ativos(){
    	return $this->belongsTo(Ativo::class);
    }
}
