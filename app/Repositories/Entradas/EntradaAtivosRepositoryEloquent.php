<?php

namespace App\Repositories\Entradas;

use App\Entities\Entradas\Entrada;

class EntradaAtivosRepositoryEloquent implements EntradaAtivosRepositoryInterface
{
    private $model;

    public function __construct(Entrada $entradas)
    {
        $this->model = $entradas;
    }

    public function index()
    {
        return $this->model->with('ativos')->get();
    }

    public function today()
    {
        return $this->model->with('ativos')->where('data', date('Y-m-d'))->get();
    }

    
}