<?php

namespace App\Entities\Martigails;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Trades\Trade;

class Martigail extends Model
{
    protected $fillable = [
        'trade_id',
        'hora_compra',
        'preco_compra',
        'preco_venda',
        'valor',
        'type_status',
        'status'
    ];

    public function trade(){
    	return $this->hasOne(Trade::class, 'id', 'trade_id');
    }

}
