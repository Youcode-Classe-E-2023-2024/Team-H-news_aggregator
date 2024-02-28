<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Post extends Controller
{
    public function getPosts(){
        $user = Auth::user();
        $categoriesWithPosts = Category::with(['posts' => function ($query) use ($user) {
            $query->orderBy('created_at', 'desc');
        }])->get();
        $result = [];
        foreach ($categoriesWithPosts as $category) {
            $categoryTitle = $category->name;
            $postsData = $category->posts->map(function ($post) use ($user) {
                $post['favorise'] = $post->favoris->isNotEmpty() ? 'like' : 'not like';
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'description' => $post->description,
                    'image' => $post->image,
                    'created_at' => $post->created_at,
                    'favorise' => $post['favorise'],
                ];
            });
            $result[] = [
                'categoryTitle' => $categoryTitle,
                'posts' => $postsData->toArray(),
            ];
        }
        return response()->json($result);
    }
}
