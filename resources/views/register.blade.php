<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script> 

   
    <title>Document</title>

</head>
<body>

<section class="container-fluid bgg">

    <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-4">
        <a class="navbar-brand">Flashbuy</a> 
     
    {!! Form::open(['url' => 'signup/submit', 'class'=> 'form-conta']) !!}
                <h1>Signup</h1>
                <div class="form-group" >
                    {{Form::label('fname', 'First Name')}} </br>
                    {{Form::Text('fname', '',['class'=>'form-control '])}} </br>
                    @error('fname')
                            <span style="color:red">* {{$message}}</span>
                            @enderror
                </div>
                <div class="form-group" >
                    {{Form::label('lname', 'Last name')}} </br>
                    {{Form::Text('lname', '',['class'=>'form-control '])}} </br>
                    @error('lname')
                            <span style="color:red">* {{$message}}</span>
                            @enderror
                </div>
                <div class="form-group" >
                    {{Form::label('email', 'E-Mail Address')}} </br>
                    {{Form::Text('email', '',['class'=>'form-control '])}} </br>
                    @error('email')
                            <span style="color:red">* {{$message}}</span>
                            @enderror
                </div>
                <div class="form-group" >
                    {{Form::label('username', 'Username')}} </br>
                    {{Form::Text('username', '',['class'=>'form-control '])}} </br>
                    @error('username')
                            <span style="color:red">* {{$message}}</span>
                            @enderror
                </div>
                <div class="form-group">
                    {{Form::label('password', 'Password')}} </br>
                    {{Form::password('password', ['class' => 'awesome form-control '])}}
                    @error('password')
                            <span style="color:red">* {{$message}}</span>
                            @enderror
                </div>
                <div class="form-group">
                    {{Form::label('password2', 'Confirm Password')}} </br>
                    {{Form::password('password2', ['class' => 'awesome form-control ' ])}}
                    @error('password2')
                            <span style="color:red">* {{$message}}</span>
                            @enderror
                </div>
                <div class="form-group" >
                    {{Form::label('phone', 'Phone No.')}} </br>
                    {{Form::Text('phone', '',['class'=>'form-control '])}} </br>
                    @error('phone')
                            <span style="color:red">* {{$message}}</span>
                            @enderror
                </div>
                <div class="form-group" >
                    {{Form::label('bday', 'Enter Birthdate')}} </br>
                    {{Form::Text('bday', '',['class'=>'form-control','id'=>'fr'])}} </br>
                    @error('bday')
                            <span style="color:red">* {{$message}}</span>
                            @enderror
                </div>
                
                <div >
                {{Form::submit('submit', ['class'=>'btn btn-primary btn-block' ])}}
                </div></br>
                <span>Already have an account?</span><a href="/signin">Sign in</a>
            {!! Form::close() !!}
            
            
            </div>
         </section>
    </section>
</section>
</br></br>



@include('inc.footer');


</body>
</html>