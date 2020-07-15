

@extends('layouts.app')



@section('extra-css')

<script src="https://js.stripe.com/v3/"></script>

@endsection



@section('sidebar')


        
@endsection
</br>

@section('content')
<style>
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
  width: 100%;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>
<script src="https://js.stripe.com/v3/"></script>

<div class="checkout-table-container">
                <h2>Your Order</h2>

                <table  class="table table-striped">
                    @foreach (Cart::content() as $item)
                 
                    <tr>
                        <td>
                            <img src="{{asset('/img/products/'.$item->model->slug.'.jpeg')}}" alt="item" height="100" width="150">
                            </td>
                            
                            <td>
                                <div style="font-weight: bold;">{{$item->model->name}}</div>
                                <div style="color:grey">{{$item->model->details}}</div>
                                <div class="checkout-table-price">₹{{$item->model->price}}</div>
                                </td>
                                </tr>

                          </br>
                    </div> 
                    @endforeach

                    </table>

                    <div class="container mb-4" style="background-color:lightgrey">
            <div class="row">
                <div class="col-12">
                    <div style="float:right; text-align: right;">
                         ₹{{Cart::subtotal()}}</br>
                         ₹{{Cart::tax()}}</br>
                        <h3><span class="">₹{{Cart::total()}}</span></h3>   
                   </div>
                   
                    <div style="float:right; margin-right:20px;">
                        Subtotal</br>
                        Tax({{$tax}}%)</br>
                        <h3>Total</h3>
                    </div>
                   
                  
                </div> 
            </div>
        </div>



<form action="{{route('charge.payment')}}" method="post" id="payment-form">
  <div class="form-row">
  @csrf
  <input type="hidden" name="money" value="{{Cart::total()}}">

  <input type="hidden" name="name" value="{{Session::get('user')[0]}}">

  <input type="hidden" name="email" value="{{Session::get('user')[1]}}">

    <label for="card-element">
      Credit or debit card
    </label>
    <div id="card-element"> 
    </div>
 
    <div id="card-errors" role="alert"></div>
  </div>
</br>
  <button class="btn btn-success">Make Payment</button>
</form>

@if(Session::has('success-message'))
<div class="alert alert-success col-md-12">
{{Session::get('success-message')}}
</div>
@endif
@if(Session::has('fail-message'))
<div class="alert alert-danger col-md-12">
{{Session::get('fail-message')}}
</div>
@endif
@endsection

@section('extra-js')
<script>
var stripe = Stripe('pk_test_cYjCkVhpEHSO6hBUpw7onKAQ00tD3gwEQx');

var elements = stripe.elements();

var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

var card = elements.create('card', {style: style});

card.mount('#card-element');

card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) { 
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else { 
      stripeTokenHandler(result.token);
    }
  });
});
 
function stripeTokenHandler(token) { 
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
 
  form.submit();
}
</script>
@endsection
