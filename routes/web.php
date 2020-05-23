<?php

use App\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  Gloudemans\Shoppingcart\Facades\Cart;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','PagesController@getHome');
Route::get('home','PagesController@getHome');

Route::get('/edit/{id}','FileUploadController@edit');
Route::get('/list/editProduct/{id}','FileUploadController@editProduct');


Route::post('/list/editProduct/{id}','FileUploadController@updateProduct');

Route::post('/edit/{id}', 'FileUploadController@update')->name('update');


Route::get('/list/delete/{id}','FileUploadController@delete');

Route::get('list','PagesController@getList');


Route::get('/list/{item}', 'UserController@show')->name('list.show');

Route::post('file-upload', 'FileUploadController@fileUploadPost')->name('file.upload.post');
Route::post('file-uploadProduct', 'FileUploadController@fileUploadProductPost')->name('file.uploadProduct.post');

Route::get('signin','PagesController@getSignin');
Route::post('/signin/submit','UserController@signin');
Route::get('signup','PagesController@getSignup');

Route::get('shoppp','PagesController@getShoppp');

Route::post('/signup/submit','UserController@signup');
Route::get('/logout','UserController@logout');
Route::group(['middleware'=>'web'], function(){
    Route::get('about','PagesController@getAbout');
    Route::get('contact','PagesController@getContact');

    Route::get('list','PagesController@getList');
    Route::get('list','UserController@catList');

    Route::get('/catagory','UserController@catList');
    Route::get('/catagory/{product}','UserController@productList');

    Route::get('/messages','MessagesController@getMessages');
    Route::post('/contact/submit','MessagesController@submit');
    Route::get('/cart','CartController@index')->name('cart.index');
    Route::post('/cart','CartController@store')->name('cart.store');
    Route::get('/checkout','CheckoutController@index')->name('checkout.index');


    Route::post('/cart/switchToSaveForLater/{product}','CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');
    Route::delete('/cart/{product}','CartController@destroy')->name('cart.destroy');

    Route::post('/saveForLater/switchToCart/{product}','SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');
    Route::delete('/saveForLater/{product}','SaveForLaterController@destroy')->name('saveForLater.destroy');
    Route::get('empty', function(){
        Cart::instance('saveForLater')->destroy();
    });
    Route::get('landingPage','PagesController@getlandingPage');
    Route::get('landingPage', 'LandingPageController@index')->name('landingPage');
    Route::get('/shop', 'ShopController@index')->name('shop.index');
    Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');
    Route::get('/shop/{id}', 'ShopController@showcat')->name('cat.show');
  
});
Route::get('welcome','PagesController@getWelcome');

Route::view('/ssearch','/ssearch');
Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $product = Product::where('name','LIKE','%'.$q.'%')->get();
    if(count($product) > 0)
        return view('ssearch')->withDetails($product)->withQuery ( $q );
    else return view ('ssearch    ')->withMessage('No Details found. Try to search again !');
});

Route::view('/index','/index');
Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'AutoCompleteController@index'));
Route::get('searchajax',array('as'=>'searchajax','uses'=>'AutoCompleteController@autoComplete'));

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
