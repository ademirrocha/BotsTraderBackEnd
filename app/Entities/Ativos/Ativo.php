<?php

namespace App\Entities\Ativos;

use Illuminate\Database\Eloquent\Model;

class Ativo extends Model
{
    protected $fillable = [
        'nome',
    ];



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
