<?php
namespace App\Services;

use Illuminate\Support\Facades\Validator;

use App\Entities\Users\ValidationUser;
use App\Repositories\UserRepositoryInterface;
use App\Exceptions\CustomValidationException;
use Illuminate\Support\Facades\Hash;

class UserServices
{
	private $repository;
	 public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function auth()
    {
    	return $this->repository->auth();
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
        $validator = Validator::make($data, ValidationUser::RULE_USER);

        if ($validator->fails()) {
            return $validator->errors();
        }

       $data['password'] = Hash::make($data['password']);
        
        return $this->repository->store($data);
    }

    public function update($id, array $data)
    {
        $validator = Validator::make($data, ValidationUser::RULE_USER);

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
