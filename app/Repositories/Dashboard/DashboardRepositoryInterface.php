<?php

namespace App\Repositories\Dashboard;

use App\Entities\Entradas\Entrada;
use App\Entities\Users\User;
use App\Entities\Ativos\Ativo;

interface DashboardRepositoryInterface
{
	public function __construct(Entrada $entradas, Ativo $ativos, User $users);
	
   	public function count();

	
}