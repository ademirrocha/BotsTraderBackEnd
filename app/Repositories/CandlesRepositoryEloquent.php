<?php

namespace App\Repositories;

use App\Entities\Candlestick\Candlestick;

class CandlesRepositoryEloquent implements CandlesRepositoryInterface
{
    private $model;

    public function __construct(Candlestick $candlestick)
    {
        $this->model = $candlestick;
    }

    public function index()
    {
        return $this->model->orderBy('data', 'DESC')->orderBy('hora', 'DESC')->get();
    }

    public function get($id)
    {
        return $this->model->find($id);
    }

    public function store(array $data)
    {
        
        $candlesticks = array();
        $candles = $data['canddles'];
        foreach ($candles as $key => $candle) {
            $candle['ativo_id'] = $candle['ativo']['id'];

            $oldCandle = $this->model->where('data', $candle['data'])
                        ->where('hora', $candle['hora'])
                        ->where('ativo_id', $candle['ativo_id'])->first();

            if( $oldCandle != null ){

                if($oldCandle->type == null && $candle['type'] != null){
                    $oldCandle->type = $candle['type'];
                    $oldCandle->save();
                }

                array_push($candlesticks, 
                    $oldCandle
                    );
            }else{
                array_push($candlesticks, $this->model->create($candle));
            }
            

        }
        
        return array_reverse($candlesticks);
    }

    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function updateStatus(array $data)
    {
        
        //return $trade;
    }

    public function destroy($id)
    {
        return $this->model->find($id)->delete();
    }

    public function today()
    {
       return $this->model->where('data', date('Y-m-d'))->orderBY('hora', 'DESC')->get();
    }

}