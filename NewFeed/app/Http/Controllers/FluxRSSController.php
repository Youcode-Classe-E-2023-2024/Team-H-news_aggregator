<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use App\Models\post;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Category;

class FluxRSSController extends Controller
{
    public function addRssPage() {
        $categories = Category::all();
        return view('admin.addSource', compact('categories'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'url' => 'required',
            'category' => 'required',
        ]);

        if($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $feed = simplexml_load_file($request->url);
        $image = $feed->channel->image->url;

        foreach ($feed->channel->item as $item) {
            if (isset($item->children('media', true)->thumbnail['url'])) {
                $image = (string)$item->children('media', true)->thumbnail['url'];
            }

            $category_id = (int)$request->category;

            if (Category::where('id', $category_id)->exists()) {
                post::create([
                    'url' => $request->url,
                    'title' => $item->title,
                    'description' => $item->description,
                    'image' => $image,
                    'category_id' => $category_id,
                ]);
            } else {
                // Handle the case where the category does not exist
                return back()->with('error', 'Invalid category selected');
            }
        }

        return redirect()->route('rss.index')->with('success', 'source added successfully!');
    }


    public function showRss(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sort' => 'int',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $posts = post::query();

        if ($request->category) {
            $posts->where('category_id', (int)$request->id);
        }

        // Sorting
        switch ($request->sort) {
            case 1:
                // newest
                $posts->orderBy('created_at', 'desc');
                break;
            default:
                // oldest
                $posts->orderBy('created_at');
        }

        // Paginate the news items
        $perPage = 10;
        $currentPage = Paginator::resolveCurrentPage() ?: 1;
        $postsPaginated = $posts->paginate($perPage, ['*'], 'page', $currentPage);

        // Set the path for pagination
        $postsPaginated->setPath(route('rss.index', ['sort' => $request->sort, 'category' => $request->category]));

        $categories = Category::all();

        return view('admin.showSources', compact('postsPaginated', 'categories'));
    }







}
