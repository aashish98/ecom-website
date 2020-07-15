@extends('layouts.app')

@section('content')
@if(!empty($data))
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>

      <th scope="col">Details</th>

      <th scope="col">Image</th>

      <th scope="col">Price</th>
      <th scope="col">Actions</th>
    
    </tr>
  </thead>
  <tbody>

  @foreach($data as $item)
    <tr>
      <td>{{$item->name}}</td>
      <td>{{$item->details}}</td>
      <td><img src="{{asset('/img/products/'.$item->slug.'.jpeg')}}" alt="" width="100" height="100"></td>
      <td style="text-align:center; color:grey">₹{{$item->price}}</td>

      <td>
      <a href="delete/{{$item->id}}"><i class="fa fa-trash" style="font-size:35px; color:red"></i></a>
      <a href="editProduct/{{$item->id}}"><i class="fa fa-edit" style="font-size:35px;"></i></a>
      </td>
     
    </tr>
    @endforeach 
  </tbody>
  @else<div class="alert alert-success alert-block">
                <strong>No Products are in this Category</strong>
        </div>
  @endif

</table>
@endsection

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
    Add A Product 
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Enter Category Details</h4>
        </div>
        <div class="modal-body">
                <form method="post" action="{{ route('file.uploadProduct.post') }}" enctype="multipart/form-data">
@csrf

  <div class="form-group">
@if(!empty($data))
  <input type="hidden" name="cat_id" value="{{$item->cat_id}}">
  @else

  <input type="hidden" name="cat_id" value="{{$cat_id}}">
  @endif

    <label >Enter Name</label>
    <input type="text" class="form-control" placeholder="Name" name="name">
  </div>
  <div class="form-group">
    <label >Enter Details</label>
    <input type="text" class="form-control" placeholder="Details" name="detail">
  </div>
  <div class="form-group">
    <label >Enter Descrition</label>
    <input type="text" class="form-control" placeholder="Desciption" name="description">
  </div>
  <div class="form-group">
    <label >Enter Price</label>
    <input type="text" class="form-control" placeholder="Price" name="price">
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