@extends('layouts.app')
<!DOCTYPE html>
<html>
 <head>
  <title>Ajax Autocomplete Textbox in Laravel using JQuery</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
   
   <div class="form-group">
    <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Enter Product Name" />
    <div id="productList">
    </div>
   </div>
   {{ csrf_field() }}
  </div>
 </body>
</html>

<script>
  
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


