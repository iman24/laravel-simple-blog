<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class FrontController extends Controller
{
    public function index()
    {
        return view('front', ['posts' => Post::orderBy('id', 'DESC')->paginate(5), 'categories' =>  Category::orderBy('id', 'ASC')->get()]);
    }

    public function read($id) {
        $idx = Post::where('slug', $id)->first();
        if($idx == null)
        abort(404);

        return view('front-read', ['data' => $idx, 'categories' =>
        Category::orderBy('id', 'ASC')->get(), 'comments' =>
        \App\Comment::where('post_id', $idx->id)->orderBy('id', 'DESC')->get()]);
    }
}
