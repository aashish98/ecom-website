<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Category;



class UserController extends Controller
{
    public function signin(Request $req)
    {
        
        $user = User::where("email",$req->input('email'))->get();
        if($user[0]->password==$req->input('password') && $user[0]->role=='user')
        {
            $req->session()->put('user',$user[0]->fname);
            return redirect('/home');

        }

        else if($user[0]->password==$req->input('password') && $user[0]->role=='admin')
        {
            $req->session()->put('admin',$user[0]->fname);
            return redirect('/home');
        }
        else  
        {
            $req->session()->flash('alert','Invalid Email or password');
            return redirect('/home');
        }
    }
    public function signup(Request $request)
    {
        $this->validate($request, [
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required',
            'password'=>'required',
            'password2'=>'required',
            'phone'=>'required',
            'bday'=>'required'

        ]);
        // return 'SUCCESS';
        $user = new User;
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->phone = $request->input('phone');
        $user->birthdate = $request->input('bday');
        
        //save user
        $user->save();

        //redirect
        return redirect('/')->with('success','user registered.');
    }
    function logout(Request $req)
    {
        $req->session()->flush('user');
        return redirect('/home');
    }
    function catList()
    {
        $data = Category::all();
        return view('list',["data"=>$data]); 
    }
   
    function show($id)
    {
        $data = Product::all()->where('cat_id', '=', $id);
        if(count($data)<1)
        {

            return redirect('list')->with('success','No Products.'); 
        }
        else{
        return view('productList',["data"=>$data]); 
        }
    }
    function add(Request $req)
    {
        // return  $req->input();
        $cat = new Category;
        $cat->name=$req->input('name');
        $cat->email=$req->input('details');
        $cat->address=$req->input('address');
        $cat->save();
        $req->session()->flash('status','Category submitted successfully');
        return redirect('list');

    }
    function delete($id)
    {
       Category::find($id)->delete();
       Session::flash('status','Category deleted successfully');
        return redirect('list');
    }
    function edit($id)
    {
        $data=Category::find($id);
        return view('edit',['data'=>$data]);
    }
    function update(Request $req)
    {
        // return  $req->input();
        $cat = Category::find($req->input('id'));
        $cat->name=$req->input('name');
        $cat->email=$req->input('email');
        $cat->address=$req->input('address');
        $cat->save();
        $req->session()->flash('status','Category Updated successfully');
        return redirect('list');

    }


}
