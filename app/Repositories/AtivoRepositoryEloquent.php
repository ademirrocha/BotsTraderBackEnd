<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AtivoRepository;
use App\Entities\Ativo;
use App\Validators\AtivoValidator;

/**
 * Class AtivoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AtivoRepositoryEloquent extends BaseRepository implements AtivoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ativo::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return AtivoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
