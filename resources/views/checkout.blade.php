@extends('layouts.app')

@section('sidebar')

    
    
    
    
<h3>Your Order:</h3>
<table class="table">
  <tbody>
  @foreach(Cart::content() as $item)
    <tr>
      <th ><img src="{{asset('img/products/'.$item->model->slug.'.jpeg')}}" hright="70" width="70"/></th>
      <td>{{$item->model->name}}</td>
      <td>{{$item->model->details}}</td>
      <td>{{$item->model->price}}</td>
      <td> <span class="badge badge-pill badge-success">{{$item->qty}}</span></td>
    
</tr>   
@endforeach
</br>
</tbody>
</table>

        <div style="float:right; text-align: right;">
                         ₹{{Cart::subtotal()}}</br>
                        <h3><span class="">₹{{Cart::total()}}</span></h3>   
                   </div>
                   
                    <div style="float:right; margin-right:20px;">
                        Subtotal</br>
                        <h3>Total</h3>
                    </div>
        


  

@endsection