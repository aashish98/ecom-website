<?php

namespace App\Http\Controllers;


use App\Order;
use App\Product;
use App\OrderProduct;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tax = Config('cart.tax');
        return view('checkout')->with(['tax'=> $tax]);

    }
    public function chargePayment(Request $request)
    {
        $total = $request->input('money');
        $replaced = Str::replaceArray(',', [''], $total);
        $final = strstr($replaced, '.', true) ?: $replaced;
        \Stripe\Stripe::setApiKey('sk_test_BUTj1DTkBYXgRDHkB3tMcIK500lK4x7mVq');
        $token = $_POST['stripeToken'];
        try{
        $customer = \Stripe\Customer::create(array(
            'name' => $request->input('name'),
            'description' => 'test description',
            'email' => $request->input('email'),
            "address" => ["city" => 'gurga', "country" => 'india', "line1" => 'bikaji', "line2" => "", "postal_code" => '112233', "state" => 'delhi']
        ));
        $charge = \Stripe\Charge::create([
            'amount'=>$final*100,
            'currency'=>'inr',
            'description'=>'example order',
            'source'=>$token,
        ]);
        Session::flash('success-message', 'Payment Done Successfully');
        return Redirect::back();
        }
        catch(\Exception $e){

        Session::flash('fail-message', 'Error!');
        }
        
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
