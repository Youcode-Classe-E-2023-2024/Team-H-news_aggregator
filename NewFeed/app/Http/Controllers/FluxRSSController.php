<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\fluxRSS;

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
        $feedUrlsQuery = fluxRSS::query();

        if ($request->category) {
            $feedUrlsQuery->where('category', strip_tags($request->category));
        }

        $feedUrls = $feedUrlsQuery->get();

        switch ($request->sort) {
            case 1:
                // newest
                $feedUrls = $feedUrls->sortByDesc('created_at');
                break;
            default:
                // oldest
                $feedUrls = $feedUrls->sortBy('created_at');
        }



        $news = [];
        $errors = [];

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

        return view('admin.showSources', compact('news', ));


    }
}
