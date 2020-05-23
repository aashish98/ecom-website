<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::inRandomOrder()->take(3)->get();
        return view('landingPage')->with('products', $products);
    }

}
