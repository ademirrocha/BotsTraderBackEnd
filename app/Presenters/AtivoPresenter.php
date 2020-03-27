<?php

namespace App\Presenters;

use App\Transformers\AtivoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AtivoPresenter.
 *
 * @package namespace App\Presenters;
 */
class AtivoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AtivoTransformer();
    }
}
