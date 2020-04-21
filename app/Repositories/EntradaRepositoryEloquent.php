<?php

namespace App\Repositories;

use App\Entities\Entradas\Entrada;

class EntradaRepositoryEloquent implements EntradaRepositoryInterface
{
    private $model;

    public function __construct(Entrada $entradas)
    {
        $this->model = $entradas;
    }

    public function index()
    {
        return $this->model->all();
    }

    public function get($id)
    {
        return $this->model->find($id)->with('ativos')->first();
    }

    public function store(array $data)
    {
        $entrada = $this->model->create($data);
        
        return $this->get($entrada->id);
    }

    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->model->find($id)->delete();
    }
}