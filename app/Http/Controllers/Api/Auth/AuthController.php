<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Users\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected function generateAccessToken($user){
    	$token = $user->createToken($user->email.'-'.now());

    	return $token->accessToken;
    }

    public function login(Request $request){
    	$request->validate([
    		'email' => 'required|email|exists:users,email',
    		'password' => 'required'
    	]);

    	if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
    		$user = Auth::user();


    		$token = $user->createToken("useremail".'-'.now());
            
            return response()->json([
    			'token' => $token->accessToken,
                $user
    		]);
    	}
    }

}
