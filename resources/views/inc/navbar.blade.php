<html lang="en">
<head>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  
</head>
<body>
<div class="header">

<div class="container-fluid mr-auto">
<a href="javascript:void(0);" style="margin-right: 10px" class="fa fa-facebook"></a>
<a href="javascript:void(0);" style="margin-right: 10px" class="fa fa-twitter"></a>
<a href="javascript:void(0);"  class="fa fa-google"></a>
@if(Session::get('user'))
<a class="nav-item nav-link " href="{{route('logout')}}" style="float:right">logout </a>
    @else
    <a href="/signup" style="float:right">{{__('hindi.signup')}}</a>
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
        <input type="button" class="btn btn-primary btn-block" value="{{__('hindi.Login')}}" onclick="location.href='/signin'"></br>
        </center>
        {{__('hindi.New customer?')}}
      <a href="/signup">{{__('hindi.Start here.')}} </a> 
     
      
          
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
      <a class="nav-link" href="{{route('shop.index')}}">{{__('hindi.shop')}}</a>
    </li>
    <li class="nav-item {{Request::is('contact') ? 'active' :''}}">
      <a class="nav-link"  href="/contact">{{__('hindi.contact')}}</a>
    </li>
   
  <li class="nav-item ">
      <a class="nav-link fa fa-cart-plus" style="font-size:20px" href="{{route('cart.index')}}">{{__('hindi.cart')}} 
      @if(Cart::instance('default')->count()>0)
      <span class="badge badge-pill badge-warning">{{Cart::instance('default')->count()}}</span>
      @endif
    </a>
    </li>
    <li class="nav-item">
    @if(Session::get('user'))
      <a class="nav-link" style="color:blue" href="">Welcome {{Session::get('user')[0]}} </a>
      
    @else
    <a   type="button" class="btn" data-toggle="modal" data-target="#myModal" style="color: grey   ">
  {{__('hindi.Hello. sign in')}}
</a>
    @endif
  </li>
  
  </ul>
  <div style = "float:right">
  <form class="form-inline" action="{{route('search.product')}}" method="post">
    <input class="form-control mr-sm-2" type="text" name="name" id="name" placeholder="{{__('hindi.search')}}" list="productList">
    <datalist id="productList">
      
    </datalist>
    {{csrf_field()}}
    <button class="btn btn-success" type="submit">{{__('hindi.search')}}</button>
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

$(document).ready(function(){

$('#name').keyup(function(){ 
       var query = $(this).val();
       if(query != '')
       {
        var _token = $('input[name="_token"]').val();
        $.ajax({
         url:"{{ route('autocomplete.fetch') }}",
         method:"POST",
         data:{query:query, _token:_token},
         success:function(data){
          $('#productList').fadeIn();  
                   $('#productList').html(data);
         }
        });
       }
   });

   $(document).on('click', 'li', function(){  
       $('#name').val($(this).text());  
       $('#productList').fadeOut();  
   });  

});
</script>
</html>