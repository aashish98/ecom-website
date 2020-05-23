@extends('layouts.app')

@section('content')
<div class="col-sm-6">
<h1> Edit Category</h1>
<form method="post" action="update" enctype="multipart/form-data">
@csrf
  <div class="form-group">

  <input type="hidden" value="{{$data->id}}" name="id">
    <label >Enter Name</label>

    <input type="text" class="form-control" placeholder="Name" value="{{$data->name}}" name="name">
  </div>
  <div class="form-group">
    <label >Enter details</label>
    <input type="text" class="form-control" placeholder="details" name="details" value="{{$data->details}}">
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