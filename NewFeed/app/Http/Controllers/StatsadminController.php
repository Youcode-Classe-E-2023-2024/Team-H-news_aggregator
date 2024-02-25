<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
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

        $donnees = $inscriptions->map(function($item, $key) {
            return $item->count();
        });

        return view('dashboard.tendance_enregistrement_utilisateur', compact('donnees'));
    }


}
