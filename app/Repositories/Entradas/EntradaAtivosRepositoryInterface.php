<?php

namespace App\Repositories\Entradas;

use App\Entities\Entradas\Entrada;

interface EntradaAtivosRepositoryInterface
{
	public function __construct(Entrada $entradas);
	
   	public function index();

   	public function today();
	
}