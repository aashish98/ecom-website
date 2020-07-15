@extends('layouts.app')


@section('content')
@if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

@if(Cart::count()>0)

<h2>{{Cart::count() }} Item(s) in Shopping cart.</h2>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Details</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::content() as $item)
                        <tr>
                            <td><a href="{{route('shop.show', $item->model->slug)}}"><img src="{{asset('img/products/'.$item->model->slug.'.jpeg')}}" hright="100" width="100"/> </a></td>
                            <td><a href="{{route('shop.show', $item->model->slug)}}">{{$item->model->name}}</a></td>
                            <td>{{$item->model->details}}</td>
                            
                            <td class="text-right">₹{{$item->model->price}}</td>
                            
                            <form action="{{route('cart.destroy', $item->rowId)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <td class="text-right"><button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                            </form>
                            <form action="{{route('cart.switchToSaveForLater', $item->rowId)}}" method="post">
                                {{csrf_field()}}
                                <td class="text-right"><button type="submit" class="btn btn-outline-dark"> Save for Later</button> </td>
                            </form>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container mb-4" style="background-color:lightgrey">
            <div class="row">
                <div class="col-12">
                    <div style="float:left">
                        <p>Shipping is free guys enjoy.</p>
                    </div>
                    <div style="float:right; text-align: right;">
                         ₹{{Cart::subtotal()}}</br>
                         ₹{{Cart::tax()}}</br>
                        <h3><span class="">₹{{Cart::total()}}</span></h3>   
                   </div>
                   
                    <div style="float:right; margin-right:20px;">
                        Subtotal</br>
                        Tax({{$tax}}%)</br>
                        <h3>Total</h3>
                    </div>
                   
                  
                </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="{{route('shop.index')}}"  class="btn btn-primary btn-block btn-lg"> Continue shopping</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a href="{{route('checkout.index')}}"  class="btn btn-lg btn-block btn-success text-uppercase" >Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>

@else
<h3 style="color:red">No items in Cart</h3>
<a href="{{route('shop.index')}}">Continue Shopping.</a></br></br></br>

@endif


@if(Cart::instance('saveForLater')->count()>0)

<h2>{{Cart::instance('saveForLater')->count() }} Item(s) saved for later.</h2>
<div class="card">
    <div class="card-body">
    <div class="table-responsive">
            <table class="table table-striped">
            <tbody>
        @foreach(Cart::instance('saveForLater')->content() as $item)
      
          
                        <tr>
                            <td><a href="{{route('shop.show', $item->model->slug)}}"><img src="{{asset('img/products/'.$item->model->slug.'.jpeg')}}" hright="100" width="100"/> </a></td>
                            <td><a href="{{route('shop.show', $item->model->slug)}}">{{$item->model->name}}</a> </br>{{$item->model->details}}</td>
                            <form action="{{route('saveForLater.destroy', $item->rowId)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <td class="text-right"><button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                            </form>
                            
                        </tr>
                    
           
        @endforeach
        </tbody>
        </table>
        </div>
    </div>
  </div>

@else

<h3>You have  no items saved for later.</h3>

@endif
</br>
</br>
</br>


@endsection

@section('breadcrumb')

<ul class="breadcrumb" >
  <div class="container">
     <a href="/">home</a>
     <i class="fa fa-chevron-right breadcrumb-separator"></i>
     <span>Shoping Cart</span>
     </div>
</ul>

@endsection

@section('mightLike')

<h4 style="color:blue">Take a look at these sugesstions, You might also like.</h4>
        <div class="grid-container ">

        @foreach($mightAlsoLike as $product)
 <div>
  <a href="{{route('shop.show', $product->slug)}}" class="might-like-product">
                        <img src="{{asset('/img/products/'.$product->slug.'.jpeg')}}" alt="" width="250" height="200">
                        <h4><div class="might-like-product-name" style="text-align:center">{{$product->name}}</div></h4>
                        <h4><div class="might-like-product-price"style="text-align:center; color:grey"> ₹{{$product->price}}</div></h4>
                    </a>

                    </div>
@endforeach
</div>

@endsection























