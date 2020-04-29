<?php


namespace App\Entities\Martingails;

class ValidationMartingail
{
    const RULE_MARTINGAIL = [
       	'trade_id' => 'required',
    ];

    const RULE_UPDATE_MARTINGAIL = [
       	'martingail_id' => 'required|exists:martigails,id',
       	'type_status' => 'required|in:À Executar,Não Executado,Cancelado,Cancelado Pelo Usuário,Executado',
    ];
}