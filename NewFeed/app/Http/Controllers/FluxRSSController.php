<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\fluxRSS;
use Illuminate\Pagination\CursorPaginator;

class FluxRSSController extends Controller
{
    public function addRssPage() {
        return view('admin.addSource');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|string',
            'url' => 'required|unique:flux_rss',
            'provider' => 'required|string',
            'category' => 'required|string|min:3',
            'description' => 'required',
        ]);

        if($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        fluxRSS::create([
            'name' => $request->name,
            'url' => $request->url,
            'provider' => $request->provider,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect()->route('rss.index')->with('success', 'source added successfully!');

    }

    public function showRss(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'string|min:3',
            'sort' => 'int',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $feedUrlsQuery = fluxRSS::query();

        // Sorting
        switch ($request->sort) {
            case 1:
                // newest
                $feedUrlsQuery->orderBy('created_at', 'desc');
                break;
            default:
                // oldest
                $feedUrlsQuery->orderBy('created_at');
        }

        // Filtering by category
        if ($request->category) {
            $feedUrlsQuery->where('category', strip_tags($request->category));
        }

        // Get all feed URLs
        $feedUrls = $feedUrlsQuery->get();

        $news = [];

        foreach ($feedUrls as $feedUrl) {
            $feed = simplexml_load_file($feedUrl->url);
            $image = $feed->channel->image->url;

            foreach ($feed->channel->item as $item) {
                if (isset($item->children('media', true)->thumbnail['url'])) {
                    $image = (string)$item->children('media', true)->thumbnail['url'];
                }

                $news[] = [
                    'title' => $item->title,
                    'description' => $item->description,
                    'image' => $image,
                ];
            }
        }

        // Paginate the news items
        $perPage = 10;
        $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1;
        $currentItems = array_slice($news, ($currentPage - 1) * $perPage, $perPage);
        $newsPaginated = new \Illuminate\Pagination\LengthAwarePaginator($currentItems, count($news), $perPage, $currentPage);
        $newsPaginated->setPath(route('rss.index'));

            return view('admin.showSources', compact('newsPaginated'));
    }





}
