<?php

namespace App\Repositories;

use App\Entities\Candlestick\Candlestick;

interface CandlesRepositoryInterface
{
	public function __construct(Candlestick $candlestick);
	
   	public function index();
	
	public function get($id);
	
	public function store(array $data);
	
	public function update($id, array $data);

	public function updateStatus(array $data);
	
	public function destroy($id);

	public function today();
}