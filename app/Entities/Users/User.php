<?php

namespace App\Entities\Users;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

//auto-bot-trader-back-end.herokuapp.com

//localhost:8000

/**
 * @OA\Info(title="API BotTrader", version="1.0")
 *
 * @OA\Server(url="https://auto-bot-trader-back-end.herokuapp.com/api")
 */

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * @OA\Get(
     *     path="/users",
     *     summary="Mostrar usuarios",
     *     @OA\Response(
     *         response=200,
     *         description="Mostrar todos os usuarios."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * ),
     * 
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * @OA\Post(
     *     path="/register",
     *     summary="Cadastrar usuarios",
     *       @OA\RequestBody(
     *       description="List of user object",
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="multipart/form-data",
     *     
     *       )
     *   ),
     *       @OA\Parameter(
     *     name="name",
     *     required=true,
     *     description="Nome de Usuário",
     *      in="query",
     *     @OA\Schema(
     *         type="string"
     *     )
     *   ),
     *    @OA\Parameter(
     *     name="email",
     *     required=true,
     *     description="Email do Usuário",
     *      in="query",
     *     @OA\Schema(
     *         type="string"
     *     )
     *   ),
     *      @OA\Parameter(
     *     name="password",
     *     required=true,
     *     description="Senha do Usuário",
     *      in="query",
     *     @OA\Schema(
     *         type="string"
     *     )
     *   ),
     *      @OA\Parameter(
     *     name="password_confirmation",
     *     required=true,
     *     description="Confirmação da senha",
     *      in="query",
     *     @OA\Schema(
     *         type="string"
     *     )
     *   ),
     *     @OA\Response(
     *         response=200,
     *         description="Usuario Cadastrado co sucesso"
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * ),
     * 
     */


}
