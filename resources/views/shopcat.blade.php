@extends('layouts.app')

@section('content')



<style>

.grid-container{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px;
/* Responsive layout - makes the menu and the content (inside the section) sit on top of each other instead of next to each other */
@media (max-width: 600px) {
  section {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
}

</style>
</head>
<body>


<section>
    <div class="grid-container">
    @if(!empty($product))
    @foreach($product as $pro)
            <div>
                    <a href="{{route('shop.show', $pro->slug)}}"><img src="{{asset('/img/products/'.$pro->slug.'.jpeg')}}" alt="" width="193" height="130"></a>
                    <a href="{{route('shop.show', $pro->slug)}}"><div class="pro-name">{{$pro->name}}</div></a>
                    <div class="pro-name">₹{{$pro->price}}.99</div>
                </div>
            @endforeach
            @else
            <div class="alert alert-success alert-dismissible fade show" role="alert">
 
No products available!!
</div>
            @endif
    </div>
</section>

@endsection

@section('sidebar')

<h2>Categories:</h2>

@foreach($categories as $category)

  <h4><a href="{{route('cat.show', $category->id)}}" style="color:grey"><div class="pro-name">{{$category->name}}</div></a></h4>

@endforeach

@endsection

@section('breadcrumb')

<ul class="breadcrumb" >
  <div class="container">
     <a href="/">home</a>
     <i class="fa fa-chevron-right breadcrumb-separator"></i>
     <span>shop</span>
     </div>
</ul>
@endsection