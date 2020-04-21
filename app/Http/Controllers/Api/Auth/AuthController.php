<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Users\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

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

        $auth = Auth::attempt(['email'=>$request->email, 'password'=>$request->password]);

    	if($auth){
    		$user = Auth::user();


    		$token = $user->createToken("useremail".'-'.now());
            
            return response()->json([
    			'token' => $token->accessToken,
                $user
    		]);
    	}else{
            return response()->json([
                'Email ou senha incorretos'
            ]);
        }
    }

    /**
     * Deauthorize User
     *
     * @param Request $request
     */
    public function logout(Request $request)
    {
        auth()->user()->token()->revoke();

        return response()->json(['data' => ['message' => 'Usuário desconectado com sucesso']]);
    }

}
