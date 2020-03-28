<?php
namespace App\Services\Entradas;

use Illuminate\Support\Facades\Validator;

use App\Entities\Entradas\ValidationEntrada;
use App\Repositories\Entradas\EntradaAtivosRepositoryInterface;
use App\Exceptions\CustomValidationException;

class EntradaAtivoServices
{
	private $repository;
	 public function __construct(EntradaAtivosRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function today() {
        return $this->repository->today();
    }

}
