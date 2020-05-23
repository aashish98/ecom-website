@extends('layouts.app')

@section('content')
@if(Session::get('user'))

<div class='products text-center'>
    @foreach($products as $product)
      <div class ="product">
        <a href=""><img src="{{asset('img/products/'.$product->slug.'.png)}}" alt="" height="100" width="100"></a>
        <a href=""><div class='product-name'>{{$product->name}}</div></a>
        <div class='product-price'>₹{{$product->price}}.99</div>
      </div>
    @endforeach
</div>


    @else
    <h1>Your Shopping cart is empty.</h1>
    Your Shopping Cart lives to serve. Give it purpose--fill it with electronic items such as switches, coolers and more. If you already have an account,  
    <a href="/signin">Sign In </a> to see your Cart.
Continue shopping on the Flashbuy.com homepage, learn about today's deals, or visit your Wish List.
    
    @endif


@endsection























