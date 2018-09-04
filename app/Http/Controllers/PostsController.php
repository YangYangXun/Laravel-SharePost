<?php

namespace App\Http\Controllers;

use App\Category;
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

    public function category_search(Request $request, $id)
    {
        $posts = Post::where('category_id', $id)->orderBy('id', 'desc')->get();
        $category = Category::where('id', $id)->first();

        $comments = Comment::all();

        $request->session()->flash('category_search', 'Result about category : ' . $category->name);

        return view('posts.sharepost', compact('posts', 'comments'));

    }

}
