<?php
namespace App\Services;

use Illuminate\Support\Facades\Validator;

use App\Entities\Candlestick\ValidationCandles;
use App\Repositories\CandlesRepositoryInterface;
use App\Exceptions\CustomValidationException;

class CandlesServices
{
	private $repository;
	 public function __construct(CandlesRepositoryInterface $repository)
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
        
        $validator = Validator::make($data, ValidationCandles::RULE_CANDLES);

        if ($validator->fails()) {
            return $validator->errors();
        }

        return $this->repository->store($data);
    }

    public function update($id, array $data)
    {
        $validator = Validator::make($data, ValidationCandles::RULE_CANDLES);

        if ($validator->fails()) {
            throw new CustomValidationException('Falha na validação dos dados', $validator->errors());
        }
        
        return $this->repository->update($id, $data);
    }

    public function updateStatus(array $data)
    {
        $validator = Validator::make($data, ValidationCandles::RULE_UPDATE_CANDLES);

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
