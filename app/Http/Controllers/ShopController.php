<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categories = Category::all()->where('status','=','1');
        $products = Product::inRandomOrder()->take(9)->get();
        return view('shop')->with('products', $products)->with('categories', $categories);

    }
    public function showcat($id)
    {
        $categories = Category::all()->where('status','=','1');
        $product = Product::all()->where('cat_id', '=', $id);
        if(count($product)>0)
        {
        return view('shopcat')->with('product', $product)->with('categories', $categories);
        }
        else{
            return view('shopcat')->with('success','no products available!!')->with('categories', $categories);
        }
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $mightAlsoLike = Product::where('slug','!=', $slug)->mightAlsoLike()->get();
        return view('product')->with([
            'product'=> $product,
            'mightAlsoLike'=> $mightAlsoLike,
            ]);
    }

}
