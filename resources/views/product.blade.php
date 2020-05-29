@extends('layouts.app')

@section('title', $product->name)

@section('content')


    <div class="boxx">
        <img src="{{asset('/img/products/'.$product->slug.'.jpeg')}}" alt="" width="300" height="300">
    </div>
    </br>
</br>
</br>
</br>
@endsection
@section('sidebar')
<div >
        <h1>{{$product->name}}</h1>
        <h2>{{$product->details}}</h2>
        <h1 style="color:grey"> ₹{{$product->price}}</h1>
        <p>{{$product->description}}</p>
    </div>  </br></br>

    <form action="{{route('cart.store')}}" method="post">
      {{csrf_field()}}
      <input type="hidden" name="id" value="{{$product->id}}">
      <input type="hidden" name="name" value="{{$product->name}}">
      <input type="hidden" name="price" value="{{$product->price}}">
      <button type="submit" class="btn btn-outline-success">Add to Cart</button>
    </form>

@endsection

@section('breadcrumb')

<ul class="breadcrumb" >
  <div class="container">
     <a href="/">home</a>
     <i class="fa fa-chevron-right breadcrumb-separator"></i>
     <a href="{{route('shop.index')}}">shop</a>
     <i class="fa fa-chevron-right breadcrumb-separator"></i>
     <span>{{$product->name}}</span>
     </div>
</ul>

@endsection

@section('mightLike')

<h2>Take a look at these sugesstions, You might also like.</h2>
        <div class="grid-container ">

        @foreach($mightAlsoLike as $product)
 <div>
  <a href="{{route('shop.show', $product->slug)}}" class="might-like-product">
                        <img src="{{asset('/img/products/'.$product->slug.'.jpeg')}}" alt="" width="250" height="200">
                        <div class="might-like-product-name" style="text-align:center">{{$product->name}}</div>
                        <div class="might-like-product-price"style="text-align:center; color:grey"> ₹{{$product->price}}</div>
                    </a>

                    </div>
@endforeach
</div>

@endsection