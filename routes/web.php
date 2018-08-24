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
    return view('welcome');
});

Route::get('/admin', function () {
    return view('layouts.admin');

})->name('layout-admin');

Route::get('/dash', function () {
    return view('layouts.dashboard');

})->name('layout-dashboard');

Route::get('/form', function () {
    return view('layouts.form-elements');

})->name('form-elements');
