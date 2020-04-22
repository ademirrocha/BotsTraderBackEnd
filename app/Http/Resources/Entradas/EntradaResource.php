<?php

namespace App\Http\Resources\Entradas;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\Ativos\AtivoResource;

class EntradaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'ativos' => new AtivoResource($this->ativos()),
            'trader' => $this->trader,
            'time' => $this->time,
            'data' => $this->data,
            'hora' => $this->hora

        ];
    }
}
