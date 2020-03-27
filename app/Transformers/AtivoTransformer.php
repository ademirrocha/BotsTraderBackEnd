<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Ativo;

/**
 * Class AtivoTransformer.
 *
 * @package namespace App\Transformers;
 */
class AtivoTransformer extends TransformerAbstract
{
    /**
     * Transform the Ativo entity.
     *
     * @param \App\Entities\Ativo $model
     *
     * @return array
     */
    public function transform(Ativo $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
