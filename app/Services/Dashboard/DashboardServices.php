<?php
namespace App\Services\Dashboard;

use Illuminate\Support\Facades\Validator;


use App\Repositories\Dashboard\DashboardRepositoryInterface;
use App\Exceptions\CustomValidationException;

class DashboardServices
{
	private $repository;
	 public function __construct(DashboardRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function count() {
        return $this->repository->count();
    }

      /**
     * @OA\Get(
     *     path="/dashboard/count",
     *     summary="Conta a quantidade de usuarios e a qtd de ativos cadastrados, e a qtd de entradas para hoje",
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


}
