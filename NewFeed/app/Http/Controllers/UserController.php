<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function index(){


        return view('client.home');
    }

    public function update_user(Request $request)
    {
        $user = Auth::user();


        $user->update([
            'username' => $request->input('username'),

        ]);


        if ($request->hasFile('profile_image')) {
            // Supprimez les anciennes images s'il y en a
            $user->clearMediaCollection('profile_images');

            $user->addMediaFromRequest('profile_image')
                ->toMediaCollection('profile_images');
        }

        return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
    }


}
