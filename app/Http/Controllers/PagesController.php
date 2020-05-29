<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getHome(){
        return view('home');
    }
    public function getAbout(){
        return view('about');
    }
    public function getContact(){
        return view('contact');
    }
    public function getSignin(){
        return view('signin');
    }
    public function getSignup(){
        return view('register');
    }
    public function getCart(){
        return view('cart');
    }
    public function getWelcome(){
        return view('welcome');
    }
    public function getlandingPage(){
        return view('landingPage');
    }
   
    public function getProduct(){
        return view('product');
    }
    public function getList(){
        return view('/list');
    }
     public function getShoppp(){
        return view('shopcat');
    }
    public function getProfile(){
        return view('profile');
    }
    
    
}
