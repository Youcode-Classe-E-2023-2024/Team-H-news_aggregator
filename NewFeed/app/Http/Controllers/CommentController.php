<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;
use App\Models\post;

class CommentController extends Controller
{
    public function index(post $post) {
        return view('client.details', compact('post'));
    }
}
