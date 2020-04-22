<?php

namespace App\Http\Controllers\Api\Entradas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Entradas\EntradaAtivosServices;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Entradas\EntradaResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EntradaAtivoController extends Controller
{
    
    private $service;

    protected function error($e){
        return response()->json(['error' => $e]);
    }

    public function __construct(EntradaAtivosServices $service)
    {
        $this->service = $service;
    }

    public function index() {

        try {
            return response()->json($this->service->index(), Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function today()
    {

        try {
            $entradas = $this->service->today();
            if($entradas->count() > 0)
                return response()->json($entradas);
            else
                return response()->json(['Nenhuma entrada para hoje']);

        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }
    

}
