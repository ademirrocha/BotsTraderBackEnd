<?php

namespace App\Http\Controllers\Api\Martingail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Martingail\MartingailServices;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Martingails\MartingailResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MartingailController extends Controller
{
    private $service;

    public function __construct(MartingailServices $service)
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

    public function unique_multidim_array($array, $key) {
        $temp_array = array();
        $key_array = array();
       
        foreach($array as $val) {

            if (! in_array($val[$key], $key_array)) {
                array_push($key_array, $val[$key]);
                array_push($temp_array, $val);
            }
        }

        dd($temp_array);
        return $temp_array;
    }


    // Comparison function 
    public function date_compare($element1, $element2) { 
        $datetime1 = strtotime($element1->trade->entrada['data'].' '.$element1->hora); 
        $datetime2 = strtotime($element2->trade->entrada['data'].' '.$element2->hora); 
        return $datetime1 > $datetime2; 
    }  
      

    public function orderDataAsc($array){
        
        for ($j = 0; $j < count($array)-1; $j++) {
            for ($i=$j+1; $i < count($array); $i++) { 
                if($this->date_compare($array[$j], $array[$i])){
                    $t = $array[$j];
                    $array[$j] = $array[$i];
                    $array[$i] = $t;
                    
                }
            }
            
        }
        return $array;
    }

    public function orderStatusTrue($array){
        for ($j = 0; $j < count($array)-1; $j++) {
            if($array[$j]->status == 0){
                for($i=$j+1; $i < count($array); $i++){
                    if($array[$i]->status == 1){
                        $t = $array[$j];
                        $array[$j] = $array[$i];
                        $array[$i] = $t;
                        $i = count($array);
                    }
                }
            }
            
        }
            
        return $array;
    }

    public function today() {

        try {
            $martingails = $this->service->today();
            
            // Sort the array  
            $martingails = $this->orderDataAsc($martingails);

            return MartingailResource::collection($martingails);
            
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}

