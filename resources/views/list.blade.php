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
<div>
<h1> List of Categories    </h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Details</th>

      <th scope="col">Image</th>
      <th scope="col">Actions</th>
    
    </tr>
  </thead>
  <tbody>
  
  @foreach($data as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td><a href="{{route('list.show', $item->id)}}">{{$item->name}}</a></td>
      <td>{{$item->details}}</td>

      <td><img src="{{asset('/img/products/'.$item->slug.'.jpeg')}}" alt="" width="100" height="100"></td>
      <td>
      <a href="edit/{{$item->id}}"><i class="fa fa-edit" style="font-size:35px;"></i></a>

      <a href="deletee/{{$item->id}}"><i class="fa fa-trash" style="font-size:35px; color:red"></i></a>

      </td>
     
    </tr>
    @endforeach 
  </tbody>

</table>



</div>


@stop

@section('sidebar')
</br>
</br>
</br>
</br>
</br>
</br>
</br>

<body>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal" >
    Add A Category 
  </button>
  </br>
  </br>

  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModa" >
    deleted categories..
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Enter Category Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         
        </div>
        <div class="modal-body">
                <form method="post" action="{{ route('file.upload.post') }}" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label >Enter Name</label>
    <input type="text" class="form-control" placeholder="Name" name="name">
  </div>
  <div class="form-group">
    <label >Enter Details</label>
    <input type="text" class="form-control" placeholder="Details" name="details">
  </div>

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
  <button type="submit" class="btn btn-primary">Save</button>
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>




<div class="modal fade" id="myModa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Deleted Categories</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         
        </div>
        <div class="modal-body">
        <table class="table">
  <thead>
    <tr style="color:grey">
      <th scope="col">#</th>
      <th scope="col">Name</th>

      <th scope="col">Image</th>
      <th scope="col">Actions</th>
    
    </tr>
  </thead>
  <tbody>
  
  @foreach($secdata as $item)
    <tr>
      <th scope="row">*</th>
      <td>{{$item->name}}</td>

      <td><img src="{{asset('/img/products/'.$item->slug.'.jpeg')}}" alt="" width="100" height="100"></td>
      <td>
      <a href="addback/{{$item->id}}">add back to list</a>
      </td>
     
    </tr>
    @endforeach 
  </tbody>

</table> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>



<script>
$('.modal-content').resizable({
      //alsoResize: ".modal-dialog",
      minHeight: 300,
      minWidth: 300
    });
    $('.modal-dialog').draggable();

    $('#myModal').on('show.bs.modal', function() {
      $(this).find('.modal-body').css({
        'max-height': '100%'
      });
    });
</script>
@endsection
