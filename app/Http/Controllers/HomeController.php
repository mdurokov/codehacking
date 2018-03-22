<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $posts = Post::paginate(3);
        $categories = Category::all();
        return view('front/home', compact('posts', 'categories'));
    }

    public function post($slug){
        $post = Post::findBySlugOrFail($slug);
        $categories = Category::all();
        $comments = $post->comments()->whereIsActive(1)->get();
        return view('post', compact('post','comments', 'categories'));
    }
}
