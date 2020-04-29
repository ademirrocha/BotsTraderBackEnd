<?php

namespace App\Http\Resources\Martingails;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Trader\TraderResource;

class MartingailResource extends JsonResource
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
            'trade_id' => $this->trade_id,
            'preco_compra' => $this->preco_compra,
            'preco_venda' => $this->preco_venda,
            'valor' => $this->valor,
            'type_status' => $this->type_status,
            'status' => $this->status,
            'token' => $this->token,
            'trades' => new TraderResource($this->trade)
        
        ];
    }
}
