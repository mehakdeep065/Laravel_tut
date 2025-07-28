<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required | confirmed',
        ]);
        if (User::where('email', $request->email)->first()) {
            return response([
                "message" => "user exists",
                "status" => "failed"
            ], 200);
        }
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        $token = $user->createToken($request->email)->plainTextToken;
        return response([
            "token" => $token,
            "message" => "regiration successfully",
        ], 201);
    }
    public function login(Request $request)
    {   session_start();
        if(!isset($_SESSION['fail_count'])){
            $_SESSION['fail_count'] = 0;
        }
        $request->validate([
            'email' => 'required | email',
            'password' => 'required ',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken($request->email)->plainTextToken;
             $_SESSION['fail_count']= 0;
            return response([
                "token" => $token,
                "message" => "Login successfully",
            ], 200);

        } else {

            $_SESSION['fail_count']+= 1;
            if ( $_SESSION['fail_count'] >= 5) {
                return response([
                    "message"=>"too many attampts",
                    "status"=>"failed"
                ],429);
            }
            return response([
                "message" => "invalide credntionsals",
                "status" => "Login Failed",
                "attampts" => $_SESSION['fail_count']

            ], 401);
        }

    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            "message" => "logout successfully",
            "status" => "success"
        ], 200);
    }

    public function logged_info()
    {
        $loggeduser = auth()->user();
        return response([
            "message" => "logged user name is",
            "user" => $loggeduser,
            "status" => "success"
        ], 200);
    }
    public function change_password(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);
        $loggeduser = auth()->user();
        $loggeduser->password = Hash::make($request->password);
        $loggeduser->save();
        return response([
            "message" => "Password change successfullly",
        ], 200);
    }
}
