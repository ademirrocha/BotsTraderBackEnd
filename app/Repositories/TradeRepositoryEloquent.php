<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Hash;

use App\Entities\Trades\Trade;
use App\Entities\Entradas\Entrada;

class TradeRepositoryEloquent implements TradeRepositoryInterface
{
    private $model;

    public function __construct(Trade $trades)
    {
        $this->model = $trades;
    }

    public function index()
    {
        return $this->model->all();
    }

    public function get($id)
    {
        return $this->model->find($id);
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function updateStatus(array $data)
    {
        $trade = $this->model->find($data['trade_id']);
        if($trade->status == 1){
            $trade->status = 0;
            $trade->type_status = $data['type_status'];

            if($data['type_status'] == 'Executado' && $trade->martigale > 0){
    
                    $entrada = Entrada::create([
                        'ativo_id' => $trade->entrada->ativos->id,
                        'data' => $trade->entrada->data,
                        'hora' => date('H:i:s', strtotime('+'. ($trade->entrada->time).' minutes', strtotime($data['hora_compra']))),
                        'time' => $trade->entrada->time,
                        'trader' => $trade->entrada->trader
                    ]);

                    $this->store([
                        'user_id' => auth()->user()->id,
                        'entrada_id' => $entrada->id,
                        'valor' => ($trade->valor * 2),
                        'martigale' => $trade->martigale - 1,
                        'token' => Hash::make(date('m-d-Y H:i:s').substr(fmod(microtime(true), 1), 1)),
                        'type' => 'martingale',
                        'trade_reference' => $trade->id
                    ]);
                
            }

        }else{
            $trade->status = 1;
            $trade->type_status = 'À Executar';
        }

        $trade->hora_compra = $data['hora_compra'] ?? $trade->hora_compra;
        $trade->preco_compra = $data['preco_compra'] ?? $trade->preco_compra;
        $trade->preco_venda = $data['preco_venda'] ?? $trade->preco_venda;
        
        $trade->save();

        return $trade;
    }

    public function destroy($id)
    {
        return $this->model->find($id)->delete();
    }

    public function today()
    {

        $trades = $this->model->whereHas('entrada',  function ($query) {
            $query->where('data', date('Y-m-d'))->where('user_id', auth()->user()->id);
        })->get();


        foreach ($trades as $key => $trade) {
            if($trade->entrada->hora < date('H:i:s') && $trade->status){
               $trades[$key] = $this->updateStatus([
                    'trade_id' => $trade->id,
                    'type_status' => 'Não Executado'
                ]);
            }
        }

        return $trades;
    }

}