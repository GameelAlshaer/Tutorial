
@extends('posts.layout')

@section('content')
<div class="container">
<div class="row justify-content-center">

<a href="{{route('posts.create')}}" type="button" class="btn bg-gradient-success btn-lg w-60 m-4">Create New Post</a>
</div>
</div>
@foreach ($posts as $post )


<div class="card-group m-3">
    <div class="card">


      <div class="card-body pt-2">
        <a href="{{route('posts.show',$post->id)}}" class="card-title h5 d-block text-darker">
          {{$post->title}}
        </a>
        <p class="card-description mb-4">
            {{$post->body}}
        </p>
        <div class="author align-items-center">
          <div class="name ps-3">
            <span>{{$post->author}}</span>
            <div class="stats">
              <small>{{$post->post_type}} </small>

            </div>
            <div class="stats">

                <small>Added by {{$post->user['name']}}</small>
              </div>
              <div class="m-1">
              @foreach ($post->tags as $tag )

              <span class="badge bg-gradient-info">{{$tag->name}}</span>

              @endforeach
            </div>
          </div>

        </div>
        @can('update_post', $post)


        <div class="container">
            <div class="row justify-content-center">

            <a href="{{route('posts.edit',$post->id)}}" type="button" class="btn bg-gradient-warning btn-lg w-60 m-4">Edit</a>
        </div>
    <div class="row text-center ">
            <form  method="POST"   action="{{route('posts.destroy',$post->id)}}">
                @method('DELETE')

                  @csrf

                      <input type="submit" class="btn bg-gradient-danger btn-lg w-60 pl-2 " id="submit" Value="Delete">

                </form>
    </div>
            </div>


@endcan
            </div>

      </div>
    </div>


@endforeach
@endsection
