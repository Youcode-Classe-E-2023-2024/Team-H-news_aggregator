<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
     /**
     * Registration Req
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirme_password' => 'required|same:password',
        ]);
       
        if ($validator->fails()) {
            $error = $validator->errors();
            // return redirect()->back()->withErrors($validator)->withInput();
            return response()->json(['error' => $error], 400);

        }
 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password)
        ]);
 
        $token = $user->createToken('Laravel-10-Passport-Auth')->accessToken;
        // return redirect()->back()->with('message', 'Your have been successfully registered');
        return response()->json(['token' => $token], 200);
    }
 
    /**
     * Login Req
     */
    public function login(Request $request)
    {
        

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('Laravel-10-Passport-Auth')->accessToken;
            return response()->json(['token' => $token], 200);

        } else {
            return response()->json(['error' => 'Invalid credentials. Please check your email and password and try again.'], 401);

        }
    }

    public function userInfo() 
    {

     $user = auth()->user();
     
     return response()->json(['user' => $user], 200);

    }
}
