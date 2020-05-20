<?php

namespace App\Http\Resources\Candlestick;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Ativos\AtivoResource;

class CandlesResource extends JsonResource
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
            'close' => $this->close,
            'open' => $this->open,
            'high' => $this->high,
            'low' => $this->low,
            'data' => $this->data,
            'hora' => $this->hora,
            'status' => $this->created_at,
            'ativo' => new AtivoResource($this->ativo)
        ];
    }
}
