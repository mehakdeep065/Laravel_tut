<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required | email',
            'password'=>'required | confirmed',
        ]);
        if(User::where('email',$request->email)->first()){
            return response([
                "message"=> "user exists",
                "status" => "failed"
            ],200);
        }
        $user = User:: create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        $token = $user->createToken($request->email)->plainTextToken;
        return response([
                "token"=>$token,
                "message"=> "regiration successfully",
            ],201);
    }
    public function login(Request $request){
           $request->validate([
            'email'=>'required | email',
            'password'=>'required ',
        ]);
        $user = User::where('email',$request->email)->first();
        if($user && Hash::check($request->password,$user->password)){
            $token = $user->createToken($request->email)->plainTextToken;
            return response([
                "token"=>$token,
                "message"=> "Login successfully",
            ],200);
        }
        else{
            return response([
                "message"=>"invalide credntionsals",
                "status"=> "Login Failed",
            ],401);
        }
        }
public function logout(){
    auth()->user()->tokens()->delete();
    return response([
        "message"=>"logout successfully",
        "status"=>"success"
    ], 200);
}
}
