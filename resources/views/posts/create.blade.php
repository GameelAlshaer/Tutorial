@extends('posts.layout')

@section('content')
<div class="container  mt-5">
    <div class="row justify-content-center">
        <div class="col-4 bg-light animate__animated animate__fadeInLeft">
            @auth
            <h3 class="p-2"> {{Auth::user()->name}} Create New Post</h3>
@else
<h3 class="p-2">Create New Post</h3>

            @endauth

    <form class="p-3" enctype="multipart/form-data" method="POST" action="{{route('posts.store')}}">
        @csrf
        <div class="form-group">
            @error('title')
            <p class="text-danger">{{$errors->first('title')}}</p>
            @enderror
          <label>Title</label>
          <input  type="text" name="title" class="@error('title') is-invalid @enderror form-control"  placeholder="Title" value="{{old('title')}}">

        </div>
@auth
<input  type="hidden" name="user_id" class="@error('user_id') is-invalid @enderror form-control"  placeholder="User ID" value="{{Auth::user()->id}}">
  @else
  <div class="form-group">
    @error('user_id')
    <p class="text-danger">{{$errors->first('user_id')}}</p>
    @enderror
  <label>User Id</label>
  <input  type="number" name="user_id" class="@error('user_id') is-invalid @enderror form-control"  placeholder="User_ID" value="{{old('user_id')}}">

</div>
@endauth


        <div class="form-group">
            @error('post_type')
         <p class="text-danger">{{$errors->first('post_type')}}</p>
         @enderror
          <label>Post Type</label>
          <select class=" @error('post_type') is-invalid @enderror form-control"  name="post_type" value="">
            {
            <option {{ old('post_type') == "Other" ? 'selected' : '' }} value="Other">Other</option>
            <option {{ old('post_type') == "Politics" ? 'selected' : '' }} value="Politics">Politics</option>
            <option {{ old('post_type') == "Fun" ? 'selected' : '' }} value="Fun">Fun</option>
            <option {{ old('post_type') == "Public" ? 'selected' : '' }} value="Public">Public</option>
            <option {{ old('post_type') == "information" ? 'selected' : '' }} value="information">information</option>

          </select>
        </div>

        <div class="form-group">
            @error('body')
        <p class="text-danger">{{$errors->first('body')}}</p>
        @enderror
          <label >Body</label>
          <textarea class="@error('body') is-invalid @enderror form-control" name="body" rows="8" placeholder="Body of the Post" >{{old('body')}}</textarea>
        </div>
        <div class="form-group">
            @error('author')
         <p class="text-danger">{{$errors->first('author')}}</p>
         @enderror
            <label >Author</label>
            <input type="text" class="@error('author') is-invalid @enderror form-control" name="author" placeholder="Author Name" value="{{old('author')}}">
          </div>
          <div class="form-group">
            @error('tags')
         <p class="text-danger">{{$errors->first('tags')}}</p>
         @enderror
          <label>Tags</label>
          <select class=" @error('tags') is-invalid @enderror form-control is-multiple"  name="tags[]" multiple value="">
            {

                @foreach ($tags as $tag)
                <option  value="{{$tag->id}}">{{$tag->name}}</option>

                @endforeach


          </select>
        </div>
        <div class="form-group">
            @error('image')
         <p class="text-danger">{{$errors->first('image')}}</p>
         @enderror
            <label >Upload Image</label>
            <input type="file" class="@error('image') is-invalid @enderror form-control" name="image" placeholder="Upload Image" value="{{old('image')}}">
          </div>
          <div class=" row justify-content-center">
            <input type="submit" class="btn bg-gradient-secondary" id="submit" Value="Submit">
          </div>
      </form>

    </div>
</div>
</div>
@endsection

