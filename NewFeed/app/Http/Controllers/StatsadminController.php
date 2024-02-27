<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsadminController extends Controller
{

    public function nombreUtilisateursPost()
    {
        $nombrePosts = Post::count(); // Nombre de posts
        $nombreUtilisateurs = User::count(); // Nombre d'utilisateurs

        return response()->json([
            'nombre_utilisateurs' => $nombreUtilisateurs,
            'nombre_posts' =>  $nombrePosts
        ]);
    }





    public function tendanceEnregistrementUtilisateur()
    {
        $dateDebut = now()->subDays(5);
        $dateFin = now();

        $inscriptions = User::whereBetween('created_at', [$dateDebut, $dateFin])
            ->orderBy('created_at')
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('Y-m-d');
            });

        $donnees1 = $inscriptions->map(function($item, $key) {
            return $item->count();
        });


//        tendances posts



        $posts = Post::whereBetween('created_at', [$dateDebut, $dateFin])
            ->orderBy('created_at')
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('Y-m-d');
            });

        $donnees2 = $posts->map(function($item, $key) {
            return $item->count();
        });
        $result = ['statsUser'=>$donnees1 , 'statsPosts'=>$donnees2];

        return response()->json($result);
    }


//    public function tendancePosts()
//    {
//
//        return response()->json($donnees);
//    }





    public function fetchPopularNewsCategories()
    {
        $categories = Post::select('category', DB::raw('COUNT(*) as count'))
            ->groupBy('category')
            ->orderBy('count', 'desc')
            ->take(5)
            ->get();

        return response()->json($categories);
    }



    public function topTrendingNews()
    {
        $articles = Article::orderBy('views', 'desc')
        ->take(5)
        ->get();
        return response()->json($articles);
    }




}
