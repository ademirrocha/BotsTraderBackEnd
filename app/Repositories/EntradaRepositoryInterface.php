<?php

namespace App\Repositories;

use App\Entities\Entradas\Entrada;
use App\Services\TraderServices;

interface EntradaRepositoryInterface
{
	public function __construct(Entrada $entradas, TraderServices $trade);
   public function index();
	
	public function get($id);
	
	public function store(array $data);
	
	public function update($id, array $data);
	
	public function destroy($id);
}