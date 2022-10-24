<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index',[
            'posts' => Post::all(),
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('posts.create',[
            'tags'=>Tag::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $post= Post::create($this->validate_request());

        $post->tags()->attach(request('tags'));
         return redirect('/posts');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',[
            'post' => $post,

         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',[
            'post'=>$post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
         $post->update($this->validate_request());
         return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
       $post->delete();
       return redirect('/posts');
    }

    protected function validate_request(){
         $post= request()->validate([
           'title' =>['required'],
           'post_type'=>['required'],
           'body'=>['required'],
           'author'=>['required'],
           'tags'=>['required','exists:tags,id'],
           'user_id'=>['required','exists:users,id'],
           'image'=>['required','max:1024','mimes:jpg'],
        ]);

        //for uploaded images
        $name="_".time().".".request()->file('image')->extension();
        // _82429487.file extention

        $path="/".request()->file('image')->storeAs('images',$name,'public_upload');
        $post['image']=$path;
        return $post;
   }
}


// RESTful Functions
// Index,Show,create,Edit,Delete


//All post for user
//specific post
//create new post
//edit existing post
//delete existing post
