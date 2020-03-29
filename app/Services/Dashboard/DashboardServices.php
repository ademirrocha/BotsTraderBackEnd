<?php
namespace App\Services\Dashboard;

use Illuminate\Support\Facades\Validator;


use App\Repositories\Dashboard\DashboardRepositoryInterface;
use App\Exceptions\CustomValidationException;

class EntradaAtivosServices
{
	private $repository;
	 public function __construct(DashboardRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function count() {
        return $this->repository->count();
    }

}
