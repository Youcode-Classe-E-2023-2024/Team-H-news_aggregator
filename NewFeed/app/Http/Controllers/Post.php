<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\post as postmodel;
use Illuminate\Support\Facades\Auth;

class Post extends Controller
{
    public function getPosts()
    {
        $user = Auth::user();

        $categoriesWithPosts = Category::with(['posts.favoris' => function ($query) use ($user) {
            if ($user) {
                $query->where('user_id', $user->id);
            }
        }])->get();

        $result = [];

        foreach ($categoriesWithPosts as $category) {
            $categoryTitle = $category->name;

            $postsData = $category->posts->map(function ($post) use ($user) {
                $favoriseStatus = 'not like';

                if ($post->relationLoaded('favoris') && $post->favoris !== null) {
                    $favoriseStatus = $post->favoris->isNotEmpty() ? 'like' : 'not like';
                }

                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'description' => $post->description,
                    'image' => $post->image,
                    'created_at' => $post->created_at,
                    'favorise' => $favoriseStatus,
                ];
            });

            $result[] = [
                'categoryTitle' => $categoryTitle,
                'posts' => $postsData->toArray(),
            ];
        }

        return $result;
    }
    public function  GetPostsById($id){
        $post = postmodel::where('id', $id)->first();
        return view('client.detail-page',compact('post'));
    }


}
