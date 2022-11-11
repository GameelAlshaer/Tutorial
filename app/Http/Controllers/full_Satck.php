<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $posts=Post::all();
        // $name=request('name');
        // $posts=file_get_contents(__DIR__.'/../../../resources/posts/first-post.html');


        return view('posts.index',[
            'posts' => $posts,

         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' =>['required'],
            'post_type'=>['required'],
            'body'=>['required'],
            'author'=>['required'],

         ]);


         $post= new Post();
         $post->title = request('title');
         $post->post_type = request('post_type');
         $post->body = request('body');
         $post->author = request('author');

         $post->save();

         $post_after_save=Post::where('title',$post->title)->first();
         $id=$post_after_save->id;
         return redirect('/posts/'.$id);

     //dd(request()->all);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post= Post::where('id',$id)->first();

        // $path=__DIR__."/../../../resources/posts/{$slug}.html";
        // if(! file_exists($path)){
        //     return redirect('/');
        //     // return "not found";
        //     // abort(404);
        //     // return view('any view such as error view');
        //}

        // $post=cache()->remember("posts.{$slug}",now()->addMinutes(1),function() use($path){
        //     var_dump('n,sdbvfbn,wf.db');
        //     return file_get_contents($path);
        // });


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
    public function edit($id)
    {
        $post= Post::where('id',$id)->first();
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
    public function update(Request $request, $id)
    {
        $post= Post::where('id',$id)->first();

        request()->validate([
            'title' =>['required'],
            'post_type'=>['required'],
            'body'=>['required'],
            'author'=>['required'],

         ]);

         $post->title = request('title');
         $post->post_type = request('post_type');
         $post->body = request('body');
         $post->author = request('author');

         $post->save();

         $post_after_save=Post::where('title',$post->title)->first();
         $id=$post_after_save->id;
         return redirect('/posts/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
// RESTful Functions
// Index,Show,create,Edit,Delete


//All post for user
//specific post
//create new post
//edit existing post
//delete existing post
