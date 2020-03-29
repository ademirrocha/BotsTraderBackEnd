<?php

namespace App\Repositories\Ativos;

use App\Entities\Ativos\Ativo;

class AtivoRepositoryEloquent implements AtivoRepositoryInterface
{
    private $model;

    public function __construct(Ativo $ativos)
    {
        $this->model = $ativos;
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
        return $this->model->create($data);
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