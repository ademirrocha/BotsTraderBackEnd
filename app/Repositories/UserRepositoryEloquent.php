<?php

namespace App\Repositories;

use App\Entities\Users\User;
use Illuminate\Support\Facades\Auth;

class UserRepositoryEloquent implements UserRepositoryInterface
{
    private $model;

    public function __construct(User $users)
    {
        $this->model = $users;
    }

   
    public function auth(){
        return Auth::user();
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