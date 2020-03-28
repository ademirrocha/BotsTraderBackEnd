<?php

namespace App\Http\Controllers\Api\Entradas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EntradaAtivoServices;

class EntradaAtivoController extends Controller
{
    
    private $service;

    protected function error($e){
        return response()->json(['error' => $e]);
    }

    public function __construct(EntradaAtivoServices $service)
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

    public function today() {

        try {
            return response()->json($this->service->today(), Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }
    

}
