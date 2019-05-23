<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PublicController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->where('publication_status', 1)->where('approval_status', 1)->take(6)->get();
        return view('front-end.home.home', compact('posts'));
    }




}
