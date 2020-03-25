<?php


namespace App\Entities\Entradas;

class ValidationEntrada
{
    const RULE_ENTRADA = [
       	'ativo_id' => 'required|number',
       	'trader' => 'required|in:call,put',
       	'data' => 'required|date',
    ];
}