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

require(app_path().'/post.php');

Route::get('/', function () {
    
    $posts = getPost();
    
    return view('socialMedia/dashboard')->withPosts($posts);
});

