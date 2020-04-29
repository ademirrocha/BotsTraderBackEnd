<?php

namespace App\Repositories\Martingails;

use App\Entities\Trades\Trade;
use App\Entities\Martigails\Martigail;

class MartingailRepositoryEloquent implements MartingailRepositoryInterface
{
    private $model;

    public function __construct(Martigail $martingails)
    {
        $this->model = $martingails;
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
        $martingail = $this->model->find($data['martingail_id']);
        if($martingail->status == 1){
            $martingail->status = 0;
            $martingail->type_status = $data['type_status'];

        }else{
            $martingail->status = 1;
            $martingail->type_status = 'À Executar';
        }

        $martingail->hora_compra = $data['hora_compra'] ?? $martingail->hora_compra;
        $martingail->preco_compra = $data['preco_compra'] ?? $martingail->preco_compra;
        $martingail->preco_venda = $data['preco_venda'] ?? $martingail->preco_venda;
        
        $martingail->save();

        return $martingail;
    }

    public function destroy($id)
    {
        return $this->model->find($id)->delete();
    }

    public function today()
    {

        $martingails = $this->model->whereHas('trade',  function ($query) {
            $query->whereHas('entrada',  function ($query) {

                $query->where('data', date('Y-m-d'))->where('user_id', auth()->user()->id);
            });
        })->where('status', 1)->get();

        
        foreach ($martingails as $key => $martingail) {
            if($martingail->hora < date('H:i:s') && $martingail->status){
               $martingails[$key] = $this->updateStatus([
                    'martingail_id' => $martingail->id,
                    'type_status' => 'Não Executado'
                ]);
            }
        }

        return $martingails;
    }

}