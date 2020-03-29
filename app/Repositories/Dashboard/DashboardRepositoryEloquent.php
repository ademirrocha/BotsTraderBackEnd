<?php

namespace App\Repositories\Dashboard;

use App\Entities\Entradas\Entrada;
use App\Entities\Users\User;
use App\Entities\Ativos\Ativo;

class DashboardRepositoryEloquent implements DashboardRepositoryInterface
{
    private $entrada;
    private $user;
    private $ativo;

    public function __construct(Entrada $entradas, Ativo $ativos, User $users)
    {
        $this->entrada = $entradas;
        $this->user = $users;
        $this->ativo = $ativos;
    }

    public function count()
    {
        $users = $this->user->count();
        $entradas = $this->entrada->count();
        $ativos = $this->ativo->count();
        return [
            'users' => $users,
            'entradas' => $entradas,
            'ativos' => $ativos,
        ];
    }

   
    
}