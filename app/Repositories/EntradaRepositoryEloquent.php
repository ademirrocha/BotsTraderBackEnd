<?php

namespace App\Repositories;

use App\Entities\Entradas\Entrada;
use App\Entities\Users\User;
use App\Services\TraderServices;
use Illuminate\Support\Facades\Hash;

class EntradaRepositoryEloquent implements EntradaRepositoryInterface
{
    private $model;
    private $trade;

    public function __construct(Entrada $entradas, TraderServices $trade)
    {
        $this->model = $entradas;
        $this->trade = $trade;
    }

    public function index()
    {
        return $this->model->all();
    }

    public function get($id)
    {
        return $this->model->where('id', $id)->with('ativos')->first();
    }

    public function store(array $data)
    {
        $entrada = $this->model->create($data);
        $users = User::all();
        foreach ($users as $user) {
            $this->trade->store([
                'user_id' => $user->id,
                'entrada_id' => $entrada->id,
                'valor' => 2.0,
                'token' => Hash::make(date('m-d-Y H:i:s').substr(fmod(microtime(true), 1), 1))
            ]);
        }
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