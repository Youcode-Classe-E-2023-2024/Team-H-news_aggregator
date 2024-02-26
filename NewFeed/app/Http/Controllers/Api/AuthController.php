<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Mail\Send_email;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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



    public function send_email(Request $request){
        
        
        
        $token = Str::random(64);
        // dd($token);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::Now()
        ]);

        Mail::to($request->email)->send(new Send_email($request,$token));

        return redirect()->back();

    }


    public function reset($email, $token){

        return view('authentication.reset', compact('email','token'));

    }

    public function reset_password(Request $request){

        // dd($request);

            $validation = $request->validate([
                'email' => 'required | email | exists:users',
                'password' => 'required|min:8|confirmed',
                'confirm-password' => 'required|min:8',
            ]);

            $update_password = DB::table('password_reset_tokens')
                ->where([
                    'email' => $request->email,
                    'token' => $request->token_email
                ])->first();

            if (!$update_password) {
                return redirect()->back()->with('error', 'The email you entered does not exist');
            }

            User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        
            DB::table('password_reset_tokens')
                ->where([
                    'email' => $request->email
                ])->delete();

            return redirect()->route('login');
                
    }
}
