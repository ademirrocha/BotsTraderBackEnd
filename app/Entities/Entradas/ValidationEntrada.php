<?php

namespace App\Entities\Entradas;

class ValidationEntrada
{
    const RULE_ENTRADA = [
       	'ativo_id' => 'required|int',
       	'trader' => 'required|in:call,put',
       	'data' => 'required|date',
       	'hora' => 'required|time',
    ];

    
}