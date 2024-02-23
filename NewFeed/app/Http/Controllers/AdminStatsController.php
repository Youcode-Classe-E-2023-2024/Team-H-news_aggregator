<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminStatsController extends Controller
{
<<<<<<< Updated upstream

public function getTotalUsers()
{
=======
    public function getTotalUsers(){
>>>>>>> Stashed changes
    $totalUsers = User::count();
    return response()->json(['total_users' => $totalUsers]);
}

    public function getUserRegistrationTrend()
    {
        $userRegistrations = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $labels = $userRegistrations->pluck('date')->toArray();
        $data = $userRegistrations->pluck('count')->toArray();

        return response()->json([
            'labels' => $labels,
            'data' => $data
        ]);
    }
<<<<<<< Updated upstream


}

=======
}
>>>>>>> Stashed changes
