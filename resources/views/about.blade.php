@extends('layouts.app')



@section('content')
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */

/* Container for flexboxes */



/* Style the content */
article {
  -webkit-flex: 3;
  -ms-flex: 3;
  flex: 3;
  background-color: #f1f1f1;
}
.grid-container{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px;
}




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
<div class="sidenav">
        <h3>By category</h3>
        <ul>
            <li><a href="">laptops</a></li>
            <li><a href="">laptops</a></li>
            <li><a href="">laptops</a></li>
            <li><a href="">laptops</a></li>
            <li><a href="">laptops</a></li>
            <li><a href="">laptops</a></li>
            <li><a href="">laptops</a></li>
            <li><a href="">laptops</a></li>
            <li><a href="">laptops</a></li>
        </ul>

        <h3>By Price</h3>
        <ul>
            <li><a href="">₹0 - ₹999</a></li>
            <li><a href="">₹1000 - ₹1999</a></li>
            <li><a href="">₹2000 - ₹3999</a></li>
            <li><a href="">₹3999+</a></li>
        </ul>
    </div>
  <article>
    <div class="grid-container">
    @foreach($products as $product)
            <div>
                    <a href=""><div class="product-name">{{$product->name}}</div></a>

                    <div class="product-name">{{$product->price}}</div>
                </div>
            @endforeach
    </div>
  </article>
</section>



@endsection