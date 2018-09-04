<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsCreateRequest;
use App\Http\Requests\PostsEditrequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Admin 權限才能看到全部貼文
        if (Auth::user()->role->name == 'administrator') {
            $posts = Post::orderBy('id', 'desc')->get();
        } else {
            $posts = Post::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        }
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        //
        $input = $request->all();

        //Find User Id
        $input['user_id'] = Auth::id();

        if ($file = $request->file('photo_id')) {
            // name your upload file
            $name = date("Y_m_d_", time()) . $file->getClientOriginalName();
            //move file
            $file->move('images', $name);
            // Add to photo table
            $photo = Photo::create(['file' => $name]);
            // Get the photo id from table
            $input['photo_id'] = $photo->id;

        }

        //Insert into posts table
        Post::create($input);

        return redirect()->route('sharepost.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $post = Post::findOrfail($id);
        $categories = Category::pluck('name', 'id')->all();

        return view('admin.posts.edit', compact('post', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsEditrequest $request, $id)
    {
        //
        $post = Post::findOrfail($id);
        $input = $request->all();

        if ($file = $request->file('photo_id')) {
            // name your upload file
            $name = date("Y_m_d_", time()) . $file->getClientOriginalName();
            //move file
            $file->move('images', $name);
            // Add to photo table
            $photo = Photo::create(['file' => $name]);
            // Get the photo id from table
            $input['photo_id'] = $photo->id;
        }

        $post->update($input);
        return redirect('admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $post = Post::findOrFail($id);
        $photo = Photo::where('id', $post->photo_id);

        unlink(public_path() . $post->photo->file);

        $post->delete();
        $photo->delete();

        $request->session()->flash('deleted_post', 'The post has been deleted');

        return redirect('admin/posts');

    }
}
