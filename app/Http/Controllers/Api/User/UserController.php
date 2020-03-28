<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserServices;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    private $service;

    public function __construct(UserServices $service)
    {
        $this->service = $service;
    }


    public function auth(){

        try {
            return response()->json($this->service->auth(), Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    	
    }

    public function index()
    {
        try {
            return response()->json($this->service->index(), Response::HTTP_OK);
        } catch (\Exception $e) {
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

            $store = $this->service->store($request->all());

            if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
                $user = Auth::user();


                $token = $user->createToken("useremail".'-'.now());
            
                return response()->json([
                    'token' => $token->accessToken,
                    $user
                ]);
            }   

            return response()->json(
                $store, 
                Response::HTTP_CREATED
            );
        } catch (\Exception $e) {
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

    private function error($e){
        return response()->json(['error' => $e]);
    }





}
