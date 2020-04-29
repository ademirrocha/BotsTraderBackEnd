<?php

namespace App\Repositories\Martingails;

use App\Entities\Martigails\Martigail;

interface MartingailRepositoryInterface
{
	public function __construct(Martigail $martingails);
	
   public function index();
	
	public function get($id);
	
	public function store(array $data);
	
	public function update($id, array $data);

	public function updateStatus(array $data);
	
	public function destroy($id);

	public function today();
}