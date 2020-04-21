<?php

namespace App\Entities\Users;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * @OA\Get(
     *     path="/users",
     *     summary="Mostrar usuarios",
     *     security={{"bearerAuth":{}}}, 
 *      @OA\Parameter(
 *         name="Authorization",
 *         in="header",
 *         required=true,
 *         description="Bearer {access-token}",
 *         @OA\Schema(
 *              type="bearerAuth"
 *         ) 
 *      ), 

     *     @OA\Response(
     *         response=200,
     *         description="Mostrar todos os usuarios.",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error.",
     *         @OA\JsonContent()
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
                mediaType="application/jason"
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





    /**
     * @OA\Post(
     *     path="/login",
     *     summary="Authenticar usuario",
     *       @OA\RequestBody(
     *       description="Entra no sistema",
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="multipart/form-data",
     *           mediaType="application/jason"
     *       )
     *   ),
     *       
     *    @OA\Parameter(
     *     name="email",
     *     required=true,
     *     description="Email do Usuário",
     *      in="query",
     *     @OA\Schema(
                format="email",
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
     *     @OA\Response(
     *         response=200,
     *         description="Authenticado com sucesso"
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * ),
     * 
     */



}
