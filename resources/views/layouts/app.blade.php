<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flash</title>
    <link rel="stylesheet" href="css/app.css">
	@yield('extra-css')
</head>
<body>
@if(session('admin'))
<div>
@include('inc.adminNav')
</div>
@else
<div>
@include('inc.navbar')
</div>
@endif






<div class="container">
@if(Request::is('/') && !Session::get('admin')  || Request::is('home') && !Session::get('admin') )
@include('inc.showcase')
@endif


@yield('breadcrumb')

<div class ="row">



<div class="col-md-8 col-lg-8">
@include('inc.messages')




@yield('content')


@if(Session::get('admin'))
@yield('adminn')
@endif










</div>



<div class="col-md-4 col-lg-4"  >
@if(!Request::is('/product') && !Request::is('cart') )
@include('inc.sidebar')
@endif
</div> 
</div>
</div>

@yield('mightLike')

@if(!Session::get('admin'))
@section('footer')
<section id="footer">
<div class="p-3 mb-2 bg-secondary text-white">
		<div class="container">
    

			<div class="row text-center text-xs-center text-sm-left text-md-left" >
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>{{__('hindi.Get to know us')}}</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="/home"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="javascript:void(0);"><i class="fa fa-angle-double-right"></i>About</a></li>
						<li><a href="javascript:void(0);"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void(0);"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
						<li><a href="javascript:void(0);"><i class="fa fa-angle-double-right"></i>Videos</a></li>
					</ul>
          <!-- <div class="p-3 mb-2 bg-primary text-white">.bg-primary</div> -->
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>{{__('hindi.Connect with us')}}</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void(0);"><i class="fa fa-angle-double-right"></i>Facebook</a></li>
						<li><a href="javascript:void(0);"><i class="fa fa-angle-double-right"></i>Twitter</a></li>
						<li><a href="javascript:void(0);"><i class="fa fa-angle-double-right"></i>Instagram</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>{{__('hindi.Let us help you')}} </h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void(0);"><i class="fa fa-angle-double-right"></i>Your Account</a></li>
						<li><a href="/messages"><i class="fa fa-angle-double-right"></i>Returns Centre</a></li>
						<li><a href="javascript:void(0);"><i class="fa fa-angle-double-right"></i>100% purchase protection</a></li>
						<li><a href="/contact"><i class="fa fa-angle-double-right"></i>Help</a></li>
					</ul>
				</div>
			</div>
      </div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void(0);"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
						
					</ul>
				</div>
				<hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p><u><a href="javascript:void(0);">National Transaction Corporation</a></u> is a Registered, Inc. Gurgaon [a wholly owned subsidiary of India Bancorp]</p>
					<p class="h6">© All right Reversed.<a class="text-green ml-2" href="/home" target="_blank">FLASHBUY</a></p>
				</div>
				<hr>
			</div>	
		</div>
	</section>
	<!-- ./Footer -->
@show
</body>
</html>

@endif

@yield('extra-js')