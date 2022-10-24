<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

// Route::get('/', function () {

//     $post="lorem ipsum dolor sit amet, consectetur adipiscing elit elit";
//     return view('welcome'
//     //,compact('post')
//     //,['post'=>$post]
// )->with('post',$post);
// });

Route::get('/',function () {


 return view('welcome',[
    'post' => file_get_contents(__DIR__.'/../resources/posts/first-post.html')
 ]);
});

Route::resource('posts',PostController::class);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// /posts => index > get
// /posts/{post} => show > get
// /posts/create => create > get
// /posts/create  => store > post
// /posts/{post}/edit => edit > get
// /posts/{post}/edit => update >put or patch
// /posts/{post}/delete => delete > delete
