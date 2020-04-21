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
        return $this->model->find($id);
    }

    public function store(array $data)
    {
        $data['hora'] = $data['hora'] . ':00';
        $entrada = $this->model->create($data);
        
        return $entrada->with('ativos')->first();
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