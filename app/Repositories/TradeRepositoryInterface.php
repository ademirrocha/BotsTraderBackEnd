<?php

namespace App\Repositories;

use App\Entities\Trades\Trade;

interface TradeRepositoryInterface
{
	public function __construct(Trade $trades);
   public function index();
	
	public function get($id);
	
	public function store(array $data);
	
	public function update($id, array $data);
	
	public function destroy($id);
}