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
<div class="jumbotron text-center">
<div class="container">
<h1>welcome to our site</h1>
<p class="lead">Signin for best experience</p>
<a class="btn btn-primary" href="signin" >Sign in</a>
</div>
</div>

@endsection
@section('sidebar')
</br>
<div class="jumbotron text-center">
<div class="container">

<h2>Head straight to shopping!!</h2>

<a class="btn btn-primary" href="shop" >Shop</a>
</div>
</div>
<style>body {background-color: coral;}</style>
@endsection


