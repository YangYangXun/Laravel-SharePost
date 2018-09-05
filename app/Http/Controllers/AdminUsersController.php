<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UsersCreateRequest;
use App\Photo;
use App\Post;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name', 'id')->all();

        // return $roles;
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersCreateRequest $request)
    {

        $input = $request->all();

        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;

        }
        //     return redirect('admin/users');

        $input['password'] = bcrypt($request->password);
        User::create($input);
        return redirect('admin/users');

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
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);

        if (trim($request->password) == '') {
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if ($file = $request->file('photo_id')) {

            $name = date("Y_m_d_", time()) . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;

        }

        $user->update($input);
        return redirect()->back();
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

        $user = User::findOrFail($id);
        $photo = Photo::where('id', $user->photo_id);
        $comments = Comment::where('user_id', $id)->get();

        //delete user reply
        foreach ($comments as $comment) {
            $comment->delete();
        }

        // delete image from the directory sametime
        if (isset($user->photo->file)) {
            unlink(public_path() . $user->photo->file);
            $photo->delete();
        }

        // delete all image about users post
        // find all post about user
        $posts = Post::where('user_id', $user->id)->get();

        foreach ($posts as $post) {
            // delete file
            unlink(public_path() . $post->photo->file);
            $post_photo = Photo::where('id', $post->photo_id);
            // delete item in database table
            $post_photo->delete();
        }

        $user->delete();

        $request->session()->flash('deleted_user', 'The user has been deleted');

        return redirect('admin/users');

    }

    public function dashboard()
    {

        // $ldate = date('l Y-m-d H:i:s');
        // return $ldate;

        $data = [
            'post' => Post::where('user_id', Auth::user()->id)->count(),
            'comment' => Comment::where('user_id', Auth::user()->id)->count(),
            'category' => Category::all()->count(),
            'user' => User::all()->count(),
        ];
        return view('layouts.dashboard', compact('data'));
    }
}
