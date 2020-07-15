@extends('layouts.app')

@section('content')
<h2>Messages</h2>
<table class="table table-sm table-dark"  id="table1">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Text</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  
  @foreach($messages as $mes)
    <tr>
      <th scope="row">*</th>
      <td>{{$mes->name}}</td>
      <td>{{$mes->email}}</td>
      <td>{{$mes->message}}</td>
      
      
      @if($mes->status ==1)
                        <td><a href="actionedit/{{ $mes->id }}"><input type="submit" name="pending" value="Pending"
                                                                         class="btn btn-warning"></a></td>
                    @else
                        <td><span style="color:green">Approved</span></td>
                    @endif
    </tr>
  @endforeach
  </tbody>
</table>

@endsection
