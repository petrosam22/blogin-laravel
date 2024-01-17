<?php

namespace App\Repositories;

use App\interfaces\UserRepositoryInterface;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
 use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserRepositories implements UserRepositoryInterface {
     
    public function register(UserRequest $request){

 

        $user = User::create([
            'name'=>$request->name ,
            'email'=>$request->email ,
            'password'=>Hash::make($request->password) ,
         ]);

        $token  = $user->createToken('user-token')->accessToken;


        return response()->json([
            'user'=>$user,
            'token'=>$token,
        ]);
    }

    public function login(Request $request){
        $user = User::where('email',$request->email)->first();
         if(Auth::attempt(['email' => $request->email , 'password'=>$request->password])){


                $token = $user->createToken('user-api')->accessToken;
                return response()->json(['token' => $token,'user'=>$user],200);


        }else{
            return response()->json(['message' => 'Email or Password is incorrect'], 401);

        };
    }


    public function getUser(){
        $user  =  Auth::user();

        return $user;
    }

}
