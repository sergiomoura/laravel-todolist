<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller {

    public function login(Request $request){
        $credentials = $request->only(['email', 'password']);
        $token = auth('api')->attempt($credentials);
        if ($token === false) {
            return response()->json(['error' => 'Não Autorizado'], 401);
        }
        return $this->responderComToken($token);
    }

    protected function responderComToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

}
