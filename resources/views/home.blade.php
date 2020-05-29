@if(Session::get('alert'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
 {{Session::get('alert')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@extends('layouts.app')


@section('content')
</br>

@if(Session::get('user'))
<div class="jumbotron text-center">
<div class="container">
<h1>How you Doing!!</h1>
</div>
</div>

@elseif(Session::get('admin')) 

<div class="jumbotron text-center">
<div class="container">

<h1>Welcome {{Session::get('admin')[0]}} to the Admin Panel</h1>
<p class="lead">You can perform the actions given below</p>
</div>
</div>


@else
<div class="jumbotron text-center">
<div class="container">

<h1>welcome to our site</h1>
<p class="lead">Signin for best experience</p>
<a class="btn btn-primary" href="signin" >Sign in</a>
</div>
</div>
@endif




@endsection


@section('adminn')

    
<style>
body {
  background-color: lightblue;
}
.center {
  margin: auto;
  padding:50px;
}
</style>

<a type="button" class="btn btn-primary btn-lg btn-block" href="../list">Categories</a>
<a type="button" class="btn btn-primary btn-lg btn-block" href="{{route('messageList')}}">Reports</a>
<a type="button" class="btn btn-primary btn-lg btn-block" href="profile">Profile</a>
  



       
@endsection




@section('sidebar')
@if(!Session::get('user') && !Session::get('admin'))
</br>
<div class="jumbotron text-center">
<div class="container">

<h2>Head straight to shopping!!</h2>

<a class="btn btn-primary" href="shop" >Shop</a>
</div>
</div>
<style>body {background-color: coral;}</style>
@endif

@if(Session::get('user'))
</br>
<div class="jumbotron text-center">
<div class="container">

<h2>Want to Change your password!!</h2>

<a class="btn btn-primary" href="profile" >Go to profile</a>
</div>
</div>
<style>body {background-color: coral;}</style>
@endif
@endsection


