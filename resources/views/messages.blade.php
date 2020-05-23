@extends('layouts.app')

@section('content')
<h1>Messages</h1>
@if(count($messages)>0)
    @foreach($messages as $message)
        <ul class="list-group">
            <li class="list-group-item">Name: {{$message->name}}</li>
            <li class="list-group-item">Name: {{$message->email}}</li>
            <li class="list-group-item">Name: {{$message->message}}</li>
            </br>
        </ul>
    @endforeach
@endif
@endsection

@section('sidebar')
@parent
<p>this is appended to sidebar</p>
@endsection