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
        
        $categories = Category::all();
        $products = Product::inRandomOrder()->take(9)->get();
        return view('shop')->with('products', $products)->with('categories', $categories);

    }
    public function showcat($id)
    {
        $categories = Category::all();
        $product = Product::all()->where('cat_id', '=', $id);
        return view('shopcat')->with('product', $product)->with('categories', $categories);
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
