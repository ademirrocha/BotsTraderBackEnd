<?php

namespace App\Http\Resources\Trader;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\Entradas\EntradaResource;

class TradeResource extends JsonResource
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
            'entrada' => new EntradaResource($this->entradas()),
            'preco_compra' => $this->preco_compra,
            'preco_venda' => $this->preco_venda,
            'valor' => $this->valor,
            'martigale' => $this->martigale,
            'status' => $this->status

        ];
    }
}
