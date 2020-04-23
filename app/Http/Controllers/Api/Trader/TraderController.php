<?php

namespace App\Http\Controllers\Api\Trader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TraderServices;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Trader\TraderResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TraderController extends Controller
{
    private $service;

    public function __construct(TraderServices $service)
    {
        $this->service = $service;
    }

    protected function error($e){
        return response()->json(['error' => $e]);
    }


    public function index()
    {
        try {
            return response()->json($this->service->index(), Response::HTTP_OK);
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
            return response()->json(
                $this->service->store($request->all()), 
                Response::HTTP_CREATED
            );
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
            return $this->today();

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


    // Comparison function 
    public function date_compare($element1, $element2) { 
        $datetime1 = strtotime($element1->entrada['data'].' '.$element1->entrada['hora']); 
        $datetime2 = strtotime($element2->entrada['data'].' '.$element2->entrada['hora']); 
        return $datetime1 > $datetime2; 
    }  
      

    public function order($array, $order){
        foreach ($array as $key => $value) {
            for ($i=$key+1; $i < count($array); $i++) { 
                if($this->date_compare($value, $array[$i])){
                    
                    $array[$key] = $array[$i];
                    $array[$i] = $value;
                    
                }
            }
            
        }
        return $array;
    }

    public function today() {

        try {
            $trades = $this->service->today();
            // Sort the array  
            $trades = $this->order($trades, 'DESC');
            return TraderResource::collection($trades);
            
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
