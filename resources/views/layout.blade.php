<html lang="en">
<head>
@section('head')
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('js/app.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  
@show
</head>
<body>
@section('header')
<div class="header">

<div class="container-fluid">
<a href="#" style="margin-right: 10px" class="fa fa-facebook"></a>
<a href="#" style="margin-right: 10px" class="fa fa-twitter"></a>
<a href="#"  class="fa fa-google"></a>

  <button type="button" class="btn" data-toggle="modal" data-target="#myModal2" style="float:right">
    Signup
  </button>
 

</div>
</br> 
  <!-- The Modal -->
  <div class="modal fade" id="myModal2">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Registration</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form  action="../function/signup.php" method = "post">
    
     
    <p>Please fill in this form to create an account.</p>
   
    <label for="">Enter First Name :</label></br>
    <input type="text" placeholder=" firstname" name="fname" required></br></br>

    <label for="">Enter Last Name :</label></br>
    <input type="text" placeholder=" lastnamme" name="lname" required></br></br>

    <label for="">Enter Email :</label></br>
    <input type="text" placeholder=" email" name="email" required></br></br>

    <label for="">Enter Username :</label></br>
    <input type="text" placeholder=" username" name="username" required></br></br>

    <label for="">Enter Birthdate :</label></br>
    <input type="text" placeholder=" birthdate" name="bdday" id="fr">  </br></br>
 
    <label for="">Enter Contact No. :</label></br>
    <input type="text" placeholder=" phone number" name="mobile" required></br></br>

    <label for="">Enter Password :</label></br>
    <input type="password" placeholder=" password" name="password" required></br></br>

    <label for="">Confirm Password :</label></br>
    <input type="password" placeholder=" confirm password" name="psw-repeat" required></br></br>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
    <input type="submit" value="submit" name="signin"><br>

  
</form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="../function/validate.php" method='post'>
     <label for="">Enter Username :</label> <input type="text" placeholder="Username" name="username" required="" ></br></br>
     <label for="">Enter Password :</label> <input type="password" placeholder="Password" name="password" required=""></br></br>
      <input type="submit" class="submit" value="submit" name="signin"><br>
      not a user?
      <a class="popup-with-form" href="#signup" >click here to register </a> 
    </form>
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
  <!-- <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <a class="navbar-brand" href="/">Flashbuy</a>
 
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="/" id="navbardrop" data-toggle="dropdown">
        Home
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Link 1</a>
        <a class="dropdown-item" href="#">Link 2</a> 
        <a class="dropdown-item" href="#">Link 3</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Categories
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Link 1</a>
        <a class="dropdown-item" href="#">Link 2</a> 
        <a class="dropdown-item" href="#">Link 3</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Accessories</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Offers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Contact</a>
    </li>
    <li class="nav-item">

  <button   type="button" class="btn" data-toggle="modal" data-target="#myModal" style="color: white">
    Hello. Sign in
  </button>
    </li>
  </ul>
  <form class="form-inline my-2 my-lg-0" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
  
 </div>
</nav> -->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="/">Flash</a>
  <ul class="navbar-nav mr-auto" >
    
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="/" id="navbardrop" data-toggle="dropdown">
        Home
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Link 1</a>
        <a class="dropdown-item" href="#">Link 2</a> 
        <a class="dropdown-item" href="#">Link 3</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Categories
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Link 1</a>
        <a class="dropdown-item" href="#">Link 2</a> 
        <a class="dropdown-item" href="#">Link 3</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Accessories</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Offers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="margin-right: 240px" href="#">Contact</a>
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
@show    
@section('body')


@show

@section('footer')
<section id="footer">
<div class="p-3 mb-2 bg-secondary text-white">
		<div class="container">
    

			<div class="row text-center text-xs-center text-sm-left text-md-left" >
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Get to know us</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>About</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Videos</a></li>
					</ul>
          <!-- <div class="p-3 mb-2 bg-primary text-white">.bg-primary</div> -->
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Connect  with us</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Facebook</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Twitter</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Instagram</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Let us help you </h5>
					<ul class="list-unstyled quick-links">
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Your Account</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Returns Centre</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>100% purchase protection</a></li>
						<li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Help</a></li>
					</ul>
				</div>
			</div>
      </div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="https://www.facebook.com/share/qb8D02"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="https://www.twitter.com/share/qb8D02"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="https://www.instagram.com/share/qb8D02"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="https://www.google.com/share/qb8D02"><i class="fa fa-google-plus"></i></a></li>
						<li class="list-inline-item"><a href="https://www.gmail.com/share/qb8D02" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				<hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
					<p class="h6">© All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
				</div>
				<hr>
			</div>	
		</div>
	</section>
	<!-- ./Footer -->
@show
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