<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; // Import de la classe Str

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateDebut = Carbon::now()->subDays(5);

        for ($i = 0; $i < 20; $i++) {
            // Générer une adresse e-mail unique
            $email = 'user' . $i . '_' . Str::random(5) . '@example.com';

            // Générer une date de création aléatoire entre la date de début et maintenant
            $dateCreation = Carbon::instance($dateDebut)->addDays(rand(0, 5))->addHours(rand(0, 23))->addMinutes(rand(0, 59))->addSeconds(rand(0, 59));

            DB::table('users')->insert([
                'name' => 'User' . $i,
                'email' => $email,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => $dateCreation,
                'updated_at' => $dateCreation, // Vous pouvez utiliser la même date de création pour la date de mise à jour
            ]);
        }
    }
}
