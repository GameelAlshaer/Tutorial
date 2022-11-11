<?php


//auth()->loginUsingId(4);
//this enable you to login with any user to test


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Policies\PostPolicy;

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




    Route::get('/posts',[PostController::class,'index'])->name('posts.index');
    Route::get('posts/create' ,[PostController::class,'create'])->name('posts.create');
    Route::get('posts/{post}',[PostController::class,'show'])->name('posts.show');
    Route::get('posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit')->middleware('can:update_post,post');
    Route::post('posts/',[PostController::class,'store'])->name('posts.store');
    Route::put('posts/{post}',[PostController::class,'update'])->name('posts.update');
    Route::delete('posts/{post}',[PostController::class,'destroy'])->name('posts.destroy')->middleware('can:update_post,post');
    Route::get('posts/create' ,[PostController::class,'create'])->name('posts.create');
    Route::post('/email',[PostController::class,'email']);
    Route::get('/email',[PostController::class,'show_email']);








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





// /posts => index > get
// /posts/{post} => show > get
// /posts/create => create > get
// /posts/create  => store > post
// /posts/{post}/edit => edit > get
// /posts/{post}/edit => update >put or patch
// /posts/{post}/delete => delete > delete
