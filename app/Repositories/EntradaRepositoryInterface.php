<?php

namespace App\Repositories;

use App\Entities\Entradas\Entrada;

interface EntradaRepositoryInterface
{
	public function __construct(Entrada $entradas);
   public function index();
	
	public function get($id);
	
	public function store(array $data);
	
	public function update($id, array $data);
	
	public function destroy($id);
}