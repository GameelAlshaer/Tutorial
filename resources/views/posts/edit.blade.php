@extends('posts.layout')

@section('content')
<div class="container  mt-5">
    <div class="row justify-content-center">
        <div class="col-4 bg-light animate__animated animate__fadeInLeft">
<h3 class="p-2"> Edit Existing Post</h3>

    <form class="p-3" method="POST"   action="{{route('posts.update',$post->id)}}">
      <input type="hidden" name="_method" value="PUT" />

        @csrf
        <div class="form-group">
            @error('title')
            <p class="text-danger">{{$errors->first('title')}}</p>
            @enderror
          <label>Title</label>
          <input  type="text" name="title" class="@error('title') is-invalid @enderror form-control"  placeholder="Title" value="{{$post->title}}">

        </div>

        <div class="form-group">
            @error('post_type')
         <p class="text-danger">{{$errors->first('post_type')}}</p>
         @enderror
          <label>Post Type</label>
          <select class=" @error('post_type') is-invalid @enderror form-control"  name="post_type" value="{{old('post_type')}}">
            <option vlaue="Other">Other</option>
            <option value="Politics">Politics</option>
            <option value="Fun">Fun</option>
            <option vlaue="Public">Public</option>
            <option value="information">information</option>

          </select>
        </div>

        <div class="form-group">
            @error('body')
        <p class="text-danger">{{$errors->first('body')}}</p>
        @enderror
          <label >Body</label>
          <textarea class="@error('body') is-invalid @enderror form-control" name="body" rows="8" >{{$post->body}}</textarea>
        </div>
        <div class="form-group">
            @error('author')
         <p class="text-danger">{{$errors->first('author')}}</p>
         @enderror
            <label >Author</label>
            <input type="text" class="@error('author') is-invalid @enderror form-control" name="author" placeholder="Author Name" value="{{$post->author}}">
          </div>

          <div class=" row justify-content-center">
            <input type="submit" class="btn bg-gradient-secondary" id="submit" Value="Submit">
          </div>
      </form>

    </div>
</div>
</div>
@endsection

