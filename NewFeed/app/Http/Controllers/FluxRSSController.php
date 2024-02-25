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
        $validator = Validator::make($request->only('name', 'url'), [
            'name' => 'required|min:3|string',
            'url' => 'required',
        ]);

        if($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        fluxRSS::create([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        return redirect()->route('rss.index')->with('success', 'source added successfully!');

    }

    public function showRss() {
        $flux = fluxRSS::all();
        $news = [];
        $errors = [];

        foreach ($flux as $feed) {
            $url = $feed->url;

            $rssData = simplexml_load_file($url);

            if ($rssData !== false) {

                foreach ($rssData->channel->item as $item) {
                    $news[] = [
                        'title' => (string)$item->title,
                        'description' => (string)$item->description,
                        'image' => (string)$item->image,
                    ];
                }
            } else {
                $errors[] = "Error fetching data from: $url";
            }
        }
        return view('admin.showSources', compact('news', 'errors'));
    }

}
