<?php
namespace App\Services;

use Illuminate\Support\Facades\Validator;

use App\Entities\Ativos\ValidationAtivo;
use App\Repositories\AtivoRepositoryInterface;
use App\Exceptions\CustomValidationException;

class AtivoServices
{
	private $repository;
	 public function __construct(AtivoRepositoryInterface $repository)
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
        
        $validator = Validator::make($data, ValidationAtivo::RULE_ATIVO);

        if ($validator->fails()) {
            return $validator->errors();
        }

        return $this->repository->store($data);
    }

    public function update($id, array $data)
    {
        $validator = Validator::make($data, ValidationAtivo::RULE_ATIVO);

        if ($validator->fails()) {
            throw new CustomValidationException('Falha na validação dos dados', $validator->errors());
        }
        
        return $this->repository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}
