<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@extends('layouts.app')
<style>
body{
    background-color: #DDDDDD;
}
</style>

@section('content')

<div id=cent >
<h2 style="color:green">You can change your Password Here!!!!</h2>
</div>
<div class="container">
@if (session()->has('status'))
                <div class="alert alert-success">
                    {{ session()->get('status') }}
                </div>
            @endif
            @if (session()->has('alert'))
                <div class="alert alert-danger">
                    {{ session()->get('alert') }}
                </div>
            @endif

            {!! Form::open(['id'=>'login','method' => 'POST', 'route' => ['profile-submit']]) !!}
            @if(Session::get('admin'))
                <input type="hidden" name="id" value="{{Session::get('admin')[3]}}">
                @endif
                @if(Session::get('user'))
                <input type="hidden" name="id" value="{{Session::get('user')[3]}}">
                @endif
                    <label>Previous Password</label>
                    <input type="password" name="pass1" class="awesome form-control">
                    @error('pass1') 
                            <span style="color:red">* {{$message}}</span>
                            @enderror
                            </br>
                    <label>New Password</label>
                    <input type="password" name="pass2" class="awesome form-control">
                    @error('pass2')
                            <span style="color:red">* {{$message}}</span>
                            @enderror
                            </br>
                    <label>Confirm Password</label>
                    <input type="password" name="pass3" class="awesome form-control">
                    @error('pass3')
                            <span style="color:red">* {{$message}}</span>
                            @enderror
                            </br>
                    <input type="submit" class="btn btn-primary btn-block">
               

                </form>
                <a href="/" style="color:green">Return to Home page</a>
                
</div>

@endsection