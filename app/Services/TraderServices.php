<?php
namespace App\Services;

use Illuminate\Support\Facades\Validator;

use App\Entities\Trades\ValidationTrader;
use App\Repositories\TradeRepositoryInterface;
use App\Exceptions\CustomValidationException;

class TraderServices
{
	private $repository;
	 public function __construct(TradeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function get($id)
    {
        return $this->repository->get($id);
    }

    public function store(array $data)
    {
        
        $validator = Validator::make($data, ValidationTrader::RULE_TRADER);

        if ($validator->fails()) {
            return $validator->errors();
        }

        return $this->repository->store($data);
    }

    public function update($id, array $data)
    {
        $validator = Validator::make($data, ValidationTrader::RULE_TRADER);

        if ($validator->fails()) {
            throw new CustomValidationException('Falha na validação dos dados', $validator->errors());
        }
        
        return $this->repository->update($id, $data);
    }

    public function updateStatus(array $data)
    {
        $validator = Validator::make($data, ValidationTrader::RULE_UPDATE_TRADER);

        if ($validator->fails()) {
            throw new CustomValidationException('Falha na validação dos dados', $validator->errors(), 404);
        }
        
        return $this->repository->updateStatus($data);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }

    public function today() {
        return $this->repository->today();
    }
}
