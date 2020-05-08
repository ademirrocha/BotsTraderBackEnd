<?php

namespace App\Entities\Ativos;

use Illuminate\Database\Eloquent\Model;

class Ativo extends Model
{
    protected $fillable = [
        'nome',
        'nome_in_olymptrade'
    ];


    public function nome_index($platform){
        return $this['nome_in_'.$platform];
    }



    /**
     * @OA\Get(
     *     path="/ativos",
     *     summary="Mostrar tdos os Ativos cadastrados",
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


}
