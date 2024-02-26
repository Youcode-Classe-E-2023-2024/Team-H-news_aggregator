<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PostSeeder extends Seeder
{
    public function run()
    {
        $dateDebut = now()->subDays(6); 

        $postsData = [
            [
                'title' => 'Titre du premier post',
                'description' => 'Description du premier post',
                'image' => 'url_de_l_image_1.jpg',
                'category_id' => 1,
            ],
            [
                'title' => 'Titre du deuxième post',
                'description' => 'Description du deuxième post',
                'image' => 'url_de_l_image_2.jpg',
                'category_id' => 2,
            ],
            // Ajoutez d'autres entrées selon vos besoins
        ];

        foreach ($postsData as $postData) {
            $dateCreation = Carbon::instance($dateDebut)
                ->addDays(rand(0, 5))
                ->addHours(rand(0, 23))
                ->addMinutes(rand(0, 59))
                ->addSeconds(rand(0, 59));

            $postData['created_at'] = $dateCreation;
            $postData['updated_at'] = $dateCreation;

            Post::create($postData);
        }
    }
}
