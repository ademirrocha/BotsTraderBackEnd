<?php

namespace App\Entities\Entradas;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Ativos\Ativo;

//auto-bot-trader-back-end.herokuapp.com

//localhost:8000

/**
 * @OA\Info(title="API BotTrader", version="1.0")
 *
 * @OA\Server(url="https://auto-bot-trader-back-end.herokuapp.com/api")
 */

class Entrada extends Model
{
    protected $fillable = [
        'ativo_id', 
        'trader', 
        'data', 
        'hora'
    ];

    /**
     * @OA\Get(
     *     path="/entradas/today",
     *     summary="Mostrar entradas com respectivos Ativos",
     *     @OA\Response(
     *         response=200,
     *         description="Mostrar entradas ."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * ),
     * 
     */

    /**
     * @OA\Post(
     *     path="/entradas/cadastro",
     *     summary="Cadastrar entradas",
     *       @OA\RequestBody(
     *       description="List of user object",
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="multipart/form-data",
     *     
     *       )
     *   ),
     *       @OA\Parameter(
     *     name="ativo_id",
     *     required=true,
     *     description="Id do Ativo cadastrado no banco",
     *      in="query",
     *     @OA\Schema(
     *         type="integer"
     *     )
     *   ),
     *    @OA\Parameter(
     *     name="trader",
     *     required=true,
     *     description="Tipo de Trader",
     *      in="query",
     *     @OA\Schema(
     *         type="array",
     *           @OA\Items(
     *               type="string",
     *               enum={"call", "put"},
     *               default="call"
     *           ),
     *     )
     *   ),
     *      @OA\Parameter(
     *     name="data",
     *     required=true,
     *     description="Data da entrada - 0000-00-00",
     *      in="query",
     *     @OA\Schema(
     *			format="date",
     *         type="string"
     *     )
     *   ),
     *      @OA\Parameter(
     *     name="hora",
     *     required=true,
     *     description="Hora da Entrada - 00:00:00",
     *      in="query",
     *     @OA\Schema(
     *         type="string"
     *     )
     *   ),
     *     @OA\Response(
     *         response=200,
     *         description="Entrada Cadastrado com sucesso"
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * ),
     * 
     */


    public function ativos(){
    	return $this->belongsTo(Ativo::class, 'ativo_id');
    }
}
