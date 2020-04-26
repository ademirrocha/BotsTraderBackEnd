<?php

namespace App\Entities\Trades;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Entradas\Entrada;

class Trade extends Model
{
    protected $fillable = [
        'user_id',
        'entrada_id',
        'preco_compra',
        'preco_venda',
        'valor',
        'martigale',
        'status',
        'token'
    ];

    public function entrada(){
    	return $this->hasOne(Entrada::class, 'id', 'entrada_id');
    }

    


}
