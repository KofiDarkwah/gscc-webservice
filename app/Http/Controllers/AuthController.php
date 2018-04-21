<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //activate object
    public function __construct()
    {

    }

    //show all users
    public function get()
    {
        return User::all();
    }

    //register user
    public function register(Request $request)
    {
        //add user info to db
       $user =  User::create([
            'username' => $request->input('username'),
            'email'    => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'api_token'=> str_random(50)
        ]);

        return response()->json(['user' => $user], 200);
    }

    //login user
    public function login(Request $request)
    {
        //check if user exists
        $user = User::where('email', $request->input('email'))->first();
        if(!$user) {
            return response()->json(['status'=>'error', 'message'=>'Invalid credentials'], 401);
        }

        if(!Hash::check($request->password, $user->password))
        {
            return response()->json(['status'=>'error', 'message'=>'Invalid credentials'], 401);
        }

        $user->update(['api_token'=>str_random(50)]);
        return response()->json(['status'=>'success', 'user'=>$user]);
    }

    //logout user
    public function logout(Request $request)
    {
        //find user and delete api token
        $user = User::where('api_token', $request->input('api_token'))->first();
        if(!$user) {
            return response()->json(['status'=>'error', 'message'=>'Not logged in'], 401);
        }
        $user->api_token = null;
        $user->save();

        return response()->json(['status'=>'success','message'=>'You successfully logged out']);

    }
}