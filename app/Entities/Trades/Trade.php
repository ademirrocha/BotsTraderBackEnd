<?php

namespace App\Entities\Trades;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    protected $fillable = [
        'user_id',
        'entrada_id',
        'preco_compra',
        'preco_venda',
        'valor',
        'time',
        'martigale',
        'status'
    ];
}
