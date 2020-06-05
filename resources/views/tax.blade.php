@extends('layouts.app')

@section('adminn')

{!! Form::open(['method' => 'POST','route' => ['setTax']]) !!}
{{Form::token()}}
                <div class="form-group" >
                    {{Form::label('tax', 'Tax percentage : ')}} </br>
                    {{Form::Text('tax', '',['class'=>' ', 'placeholder'=>$value])}} </br>
                            @error('tax')
                            <span style="color:red">* {{$message}}</span>
                            @enderror
                </div>
                
                <div >
                {{Form::submit('submit', ['class'=>'btn btn-primary' ])}}
                </div>
{!! Form::close() !!}

@endsection