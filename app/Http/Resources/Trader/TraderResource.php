<?php

namespace App\Http\Resources\Trader;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Entradas\EntradaResource;

class TraderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'type' => $this->type,
            'preco_compra' => $this->preco_compra,
            'preco_venda' => $this->preco_venda,
            'valor' => $this->valor,
            'martigale' => $this->martigale,
            'type_status' => $this->type_status,
            'status' => $this->status,
            'token' => $this->token,
            'entrada' => new EntradaResource($this->entrada)
        
        ];
    }
}
