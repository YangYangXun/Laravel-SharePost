<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        $comments = Comment::all();
        return view('posts.sharepost', compact('posts', 'comments'));
    }

    public function store(Request $request)
    {

    }

}
