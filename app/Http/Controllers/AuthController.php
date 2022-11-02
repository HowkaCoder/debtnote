<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;	
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{

     public function login(LoginUserRequest $request)
    {
        $user = User::where('phone', $request->phone)->first();
        if($user){
        if (!Hash::check($request->password , $user->password)) {
            return response(["message"=>"Credentials not match"] , 401);
        }}else{
            return response(["message"=>"Credentials not match"] , 401);

        }
        $user['token'] = $user->createToken('API Token')->plainTextToken;
        return response($user);
    }


     public function logout()
    {
        auth('sanctum')->user()->tokens()->delete();

        return response([
            'message' => 'Tokens Revoked'
        ]);
    }


}
