<?php

namespace App\Entities\Candlestick;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Ativos\Ativo;

class Candlestick extends Model
{
    
	protected $fillable = [
    	'ativo_id',
        'close',
        'open',
        'high',
        'low',
        'data',
        'hora'
    ];

    public function ativo(){
        return $this->belongsTo(Ativo::class, 'ativo_id');
    }

}
