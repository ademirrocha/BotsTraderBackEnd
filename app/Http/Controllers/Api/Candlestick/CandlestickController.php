<?php

namespace App\Http\Controllers\Api\Candlestick;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CandlesServices;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Candlestick\CandlesResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CandlestickController extends Controller
{
    private $service;

    public function __construct(CandlesServices $service)
    {
        $this->service = $service;
    }

    protected function error($e){
        return response()->json(['error' => $e]);
    }


    public function index()
    {
        try {
            $candles = $this->service->index();

            return CandlesResource::collection($candles);
            
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function get($id)
    {
        try {
            return response()->json($this->service->get($id), Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->error();
        }
    }

    public function store(Request $request)
    {
        try {
            $candles = $this->service->store($request->all());
            return CandlesResource::collection($candles);
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        try {
            return response()->json(
                $this->service->update($id, $request->all()), 
                Response::HTTP_OK
            );
        } catch (CustomValidationException $e) {
            return $this->error($e->getMessage(), $e->getDetails());
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $this->service->updateStatus($request->all());
            return $this->today($request);

        } catch (CustomValidationException $e) {
            return $this->error($e->getMessage(), $e->getDetails());
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            return response()->json(
                $this->service->destroy($id), 
                Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function today(Request $request) {

        try {
            $candles = $this->service->today();
            
            return CandlesResource::collection($candles);
            
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
