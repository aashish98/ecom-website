<html lang="en">
<head>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('js/app.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  
</head>
<body>
<div class="header">

<div class="container-fluid mr-auto">
<a href="#" style="margin-right: 10px" class="fa fa-facebook"></a>
<a href="#" style="margin-right: 10px" class="fa fa-twitter"></a>
<a href="#"  class="fa fa-google"></a>
@if(Session::get('user'))
<a class="nav-item nav-link " href="logout" style="float:right">logout </a>
    @else
    <a href="/signup" style="float:right">Signup</a>
    @endif
 
</div>
</br>
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        
        <!-- Modal body -->
        <div class="modal-body">
        <center>
        <input type="button" class="btn btn-primary btn-block" value="Login" onclick="location.href='/signin'"></br>
        </center>
      New customer?
      <a href="/signup">Start here. </a> 
     
      
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="/" style="color:yellow">Flashbuy</a>
  <ul class="navbar-nav mr-auto" >
    
  <li class="nav-item {{Request::is('about') ? 'active' :''}}">
      <a class="nav-link" href="/">Home</a>
    </li>
    <li class="nav-item {{Request::is('about') ? 'active' :''}}">
      <a class="nav-link" href="{{route('shop.index')}}">Shop</a>
    </li>
    <li class="nav-item {{Request::is('contact') ? 'active' :''}}">
      <a class="nav-link"  href="/contact">Contact</a>
    </li>
   
  <li class="nav-item ">
      <a class="nav-link fa fa-cart-plus" style="font-size:20px" href="{{route('cart.index')}}">cart 
      @if(Cart::instance('default')->count()>0)
      <span class="badge badge-pill badge-warning">{{Cart::instance('default')->count()}}</span>
      @endif
    </a>
    </li>
    <li class="nav-item">
    @if(Session::get('user'))
      <a class="nav-link" style="color:blue" href="">Welcome {{Session::get('user')}} </a>
      
    @else
    <a   type="button" class="btn" data-toggle="modal" data-target="#myModal" style="color: grey   ">
  Hello. Sign in
</a>
    @endif
  </li>
  
  </ul>
  <div style = "float:right">
  <form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-success" type="submit">Search</button>
  </form>
  </div>
 
</nav>

</div>
</body>
<script>
$(function() {

$('[data-toggle="modal"]').hover(function() {
  var modalId = $(this).data('target');
  $(modalId).modal('show');

});

});

</script>
</html>