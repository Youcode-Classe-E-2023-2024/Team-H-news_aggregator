<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class StatsadminController extends Controller
{
    public function nombreUtilisateurs()
    {
        $nombreUtilisateurs = User::count();
        return $nombreUtilisateurs;
    }

    public function nombrePublications()
    {
        $nombrePublications = Post::count();
        return $nombrePublications;
    }

}
