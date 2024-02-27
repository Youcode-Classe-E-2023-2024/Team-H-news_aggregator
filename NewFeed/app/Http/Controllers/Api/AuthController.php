<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
            'password' => 'required|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password)
        ]);
 
        $token = $user->createToken('Laravel-10-Passport-Auth')->accessToken;
        return redirect()->back()->with('message', 'Your have been successfully registered');

        // return response()->json(['token' => $token], 200);
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
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function userInfo() 
    {

     $user = auth()->user();
     
     return response()->json(['user' => $user], 200);

    }



    /*======================  mohammed elghanam  =======================*/
    // task softdelete and restore

    // function of softdelete
    public function destroy(User $user)
    {
        // dd($user);
        $user->delete();
        session()->put('deleted_user_id', $user->id);
        return redirect()->route('display');
    }

    // function restore users
    public function restoreusers()
    {
        $user_id = session()->pull('deleted_user_id');
        $user = User::withTrashed()->findOrFail($user_id);
        $user->restore();
        return redirect()->route('display');

    }


    public function show(){
        $users = User::all();
        return view('admin.dsplay_users', compact('users'));
    }

    /*======================  mohammed elghanam  =======================*/
}
