<?php

namespace App\Repositories;

use App\Entities\Trades\Trade;

class TradeRepositoryEloquent implements TradeRepositoryInterface
{
    private $model;

    public function __construct(Trade $trades)
    {
        $this->model = $trades;
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