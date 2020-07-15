@extends('layouts.app')

@section('content')
@if(Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
 {{Session::get('status')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="col-sm-6">
<h1> Edit Product</h1>
<form method="post" action="updateProduct" enctype="multipart/form-data">
@csrf
  <div class="form-group">

  <input type="hidden" value="{{$data->id}}" name="id">
    <label >Enter Name</label>

    <input type="text" class="form-control"  value="{{$data->name}}" name="name">
  </div>
  <div class="form-group">
    <label >Enter details</label>
    <input type="text" class="form-control"   value="{{$data->details}}" name="details">
  </div>
  <div class="form-group">
    <label >Enter description</label>

    <input type="text" class="form-control" name="description" value="{{$data->description}}">
  </div>
  <div class="form-group">
    <label >Enter Proce</label>

    <input type="text" class="form-control" name="price" value="{{$data->price}}">
  </div>
 <div>
  <label for="">previous image</label><br>
  <img src="{{asset('/img/products/'.$data->slug.'.jpeg')}}" alt="" width="193" height="130">
 </div></br>
  <div class="form-group">
  <label >Upload Image</label>

    <div class="panel panel-primary">
      <div class="panel-body">
   
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        <img src="img/products/{{ Session::get('file')}}" width="150" height="100">
        @endif
  
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
  
            @csrf
            <div class="row">
  
                <div class="col-md-6">
                    <input type="file" name="file" class="form-control">
                </div>
   
            </div>
  
      </div>
    </div>
</div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>

</div>
@stop
