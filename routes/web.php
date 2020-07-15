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


Route::get('profile','PagesController@getProfile');
Route::post('profile/submit','UserController@updatePassword')->name('profile-submit');


Route::get('signin','PagesController@getSignin');
Route::post('/signin/submit','UserController@signin');
Route::get('signup','PagesController@getSignup');
Route::get('shoppp','PagesController@getShoppp');
Route::post('/signup/submit','UserController@signup');
Route::get('/logout','UserController@logout')->name('logout');
Route::group(['middleware'=>'web'], function(){
    Route::get('/edit/{id}','FileUploadController@edit');
    Route::get('/list/editProduct/{id}','FileUploadController@editProduct');
    Route::post('/list/editProduct/{id}','FileUploadController@updateProduct');
    Route::post('/edit/{id}', 'FileUploadController@update')->name('update');
    Route::get('/deletedCat/{id}', 'UserController@softDelete')->name('deletedCat');
    Route::get('/addback/{id}', 'UserController@addback');
    Route::get('/deletee/{id}', 'UserController@softDelete');
    Route::post('/editProduct/{id}', 'FileUploadController@updateProduct')->name('updateProduct');
    Route::get('/list/delete/{id}','FileUploadController@delete');
    Route::post('/messageList/softDelete/{id}','MessagesController@softDelete');
    Route::get('/actionedit/{id}', 'MessagesController@actionedit');
    Route::get('list','PagesController@getList');   
    Route::get('/list/{item}', 'UserController@show')->name('list.show');
    Route::post('file-upload', 'FileUploadController@fileUploadPost')->name('file.upload.post');
    Route::post('file-uploadProduct', 'FileUploadController@fileUploadProductPost')->name('file.uploadProduct.post');
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
    Route::post('charge-payment', 'CheckoutController@chargePayment')->name('charge.payment');
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

    Route::get('/messageList', 'MessagesController@getMessages')->name('messageList');
    Route::get('/taxChange', 'MessagesController@getTax')->name('taxChange');

    Route::post('/taxChange/submit', 'MessagesController@setTax')->name('setTax');


    Route::get('/shop/{id}', 'ShopController@showcat')->name('cat.show')->where('id', '[0-9]+');
    Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');
    Route::resource('/orders', 'OrderController');
});
Route::get('welcome','PagesController@getWelcome');


Route::post('/fetch','AutocompleteController@fetch')->name('autocomplete.fetch');
Route::post('/fetchh','AutocompleteController@searchproduct')->name('search.product');

Route::view('/index','/index');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
