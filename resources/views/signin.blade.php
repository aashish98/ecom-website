<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
   
    <title>Document</title>
</head>
<body>

<section class="container-fluid bgg">

    <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-4">
        <a class="navbar-brand">Flashbuy</a> 
     
    {!! Form::open(['url' => 'signin/submit', 'class'=> 'form-conta', 'method' => 'post']) !!}
                {{Form::token()}}
                <div class="form-group" >
                    {{Form::label('email', 'E-Mail Address : ')}} </br>
                    {{Form::Text('email', '',['class'=>'form-control '])}} </br>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    {{Form::label('password', 'Password : ')}} </br>
                    {{Form::password('password', ['class' => 'awesome form-control ' , 'placeholder'=>  'atleast 6 characters' ])}}
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div >
                {{Form::submit('submit', ['class'=>'btn btn-primary btn-block' ])}}
                </div>
                <span>By continuing, you agree to Flashbuy's </span><a href="">Conditions of Use</a> <span> and </span> <a href="">Privacy Notice.</a>
            {!! Form::close() !!}
           
         </section>
    </section>
</section>


   



<section class="container-fluid bgg">

    <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-4">
                
                <div class='reg'>
                <span style="color:blue">New to Flasbuy?</span>
                <a href="/signup" class='btn btn-primary btn-block'>Create your Flashbuy account</a>

                </div>
         </section>
    </section>
</section>

<div class="strike">
   <span style="text-align:center">copyrights</span>
</div>

@include('inc.footer')



</body>
</html>