@extends('posts.layout')

@section('content')

@if (session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text">{{session('message')}}</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="container  mt-5">
    <div class="row justify-content-center">
        <div class="col-4 bg-light animate__animated animate__fadeInLeft">

<h3 class="p-2">Email Form</h3>
<form class="p-3"  method="POST" action="/email">
    @csrf
    <div class="form-group">
        @error('email')
        <p class="text-danger">{{$errors->first('email')}}</p>
        @enderror
      <label>Email</label>
      <input  type="text" name="email" class="@error('eamil') is-invalid @enderror form-control"  placeholder="Email" value="{{old('email')}}">

    </div>

      <div class=" row justify-content-center">
        <input type="submit" class="btn bg-gradient-secondary" id="submit" Value="Send Email">
      </div>
  </form>
</div>
</div>
</div>
@endsection
