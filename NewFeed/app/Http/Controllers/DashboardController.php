<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // $user_roles = $user->roles;
        // Session::put('user_roles', $user_roles);

        // Modify the condition based on your roles structure
        if ($user->roles === true) {
            return response()->json('dashboard');
        } else {
            return response()->json('client');
        }
    }

    // public function admin()
    // {
    //     $val = Session::get('user_roles');
    //     return ('ok'.$val);
    // }
}