<?php


namespace App\Entities\Trades;

class ValidationTrader
{
    const RULE_TRADER = [
       	'entrada_id' => 'required',
    ];

    const RULE_UPDATE_TRADER = [
       	'trade_id' => 'required|exists:trades,id',
       	'type_status' => 'required|in:À Executar,Não Executado,Cancelado,Cancelado Pelo Usuário,Executado',
    ];
}