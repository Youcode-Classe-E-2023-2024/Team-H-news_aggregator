<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\favoris;

class FavorisController extends Controller
{

    function makeFavoritePost($postId)
    {
        $user = Auth::user();

        $existingFavorite = favoris::where('user_id', $user->id)
            ->where('post_id', $postId)
            ->first();
        if ($existingFavorite) {
            $existingFavorite->delete();
            return response()->json(['success' =>'not like'],200);
        }
        favoris::create([
            'user_id' => $user->id,
            'post_id' => $postId,
        ]);
        return response()->json(['success' =>'like'],200);
    }



}
