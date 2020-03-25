<?php

namespace App\Repositories;

use App\Entities\Ativos\Ativo;

interface AtivoRepositoryInterface
{
	public function __construct(Ativo $ativos);
   public function index();
	
	public function get($id);
	
	public function store(array $data);
	
	public function update($id, array $data);
	
	public function destroy($id);
}