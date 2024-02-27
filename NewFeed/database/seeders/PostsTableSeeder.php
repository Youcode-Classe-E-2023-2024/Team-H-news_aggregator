<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dateDebut = Carbon::now()->subDays(6);

        for ($i = 0; $i < 20; $i++) {
            $dateCreation = $dateDebut->copy()->addDays(rand(0, 5))->addHours(rand(0, 23))->addMinutes(rand(0, 59))->addSeconds(rand(0, 59));

            DB::table('post')->insert([
                'title' => 'Post Title ' . $i,
                'description' => 'Description for post ' . $i,
                'image' => 'path/to/image' . $i . '.jpg',
                'category_id' => rand(1, 3),
                'created_at' => $dateCreation,
                'updated_at' => $dateCreation,
            ]);
        }
    }
}
