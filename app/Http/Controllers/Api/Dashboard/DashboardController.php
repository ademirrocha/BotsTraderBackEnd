<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Dashboard\DashboardServices;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    
    private $service;

    protected function error($e){
        return response()->json(['error' => $e]);
    }

    public function __construct(DashboardServices $service)
    {
        $this->service = $service;
    }

    public function count() {

        try {
            return response()->json($this->service->count(), Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

}
