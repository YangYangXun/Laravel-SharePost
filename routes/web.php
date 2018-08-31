<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return redirect()->route('sharepost.home');
});

Route::get('/admin', function () {
    return view('admin.index');

})->name('layout-admin');

Route::get('/dash', function () {
    return view('layouts.dashboard');

})->name('layout-dashboard');

Route::get('/form', function () {
    return view('layouts.form-elements');

})->name('form-elements');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');
    Route::resource('admin/comments', 'PostCommentsController');
});

Route::get('/post', 'PostsController@index')->name('sharepost.home');
