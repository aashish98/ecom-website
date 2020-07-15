<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Category;

use Crypt;



class UserController extends Controller
{
    public function signin(Request $req)
    {
        $req->validate([
            'email' => 'required | email',
            'password'=>'required | min:6 | max:12'
        ]);
        $user = User::where("email",$req->input('email'))->get();
        if(Crypt::decrypt($user[0]->password)==$req->input('password') && $user[0]->role=='user')
        {
            $use = [$user[0]->fname, $user[0]->email,$user[0]->role,$user[0]->id];
            $req->session()->put('user',$use);
            return redirect('/home');

        }

        else if(Crypt::decrypt($user[0]->password)==$req->input('password') && $user[0]->role=='admin')
        {
            $use = [$user[0]->fname, $user[0]->email,$user[0]->role,$user[0]->id];
            $req->session()->put('admin',$use);
            return redirect('/home');
        }
        else  
        {
            $req->session()->flash('alert','Invalid Email or password');
            return back();
        }
    }
    public function signup(Request $request)
    {
        $this->validate($request, [
            'fname'=>'required',
            'lname'=>'required',
            'username'=>'required',
            'email'=>'required | email',
            'password'=>'required | min:6 | max:12 ',
            'password2'=>'required_with:password|same:password|min:6 | max:12',
            'phone'=>'required|digits:10',
            'bday'=>'required | date'

        ]);
        // return 'SUCCESS';
        $user = new User;
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        
        $user->password=Crypt::encrypt($request->input('password'));

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
        $data = Category::all()->where('status','=','1');
        $secdata = Category::all()->where('status','=','0');
        return view('list',["data"=>$data, "secdata"=>$secdata]); 
    }
    function softDelete($id)
    {
        $cat = Category::find($id);
        $cat->status='0';
        $cat->save();
        return redirect('list');
    }
    function addback($id)
    {
        $cat = Category::find($id);
        $cat->status='1';
        $cat->save();
        return redirect('list');
    }
   
    function show($id)
    {
        $data = Product::all()->where('cat_id', '=', $id);
        if(count($data)<1)
        {
            $pada = array('cat_id' => $id);
            return view('productList')->with($pada); 
        }
        else{
        return view('productList',["data"=>$data]); 
        }
    }
    function add(Request $req)
    {
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
    
    public function updatePassword(Request $req)
    {
        $this->validate($req, [
            'pass1'=>'required | min:6 | max:12',
            'pass2'=>'required | min:6 | max:12 ',
            'pass3'=>'required_with:password|same:pass2|min:6 | max:12',
        ]);
        $id = $req->input('id');
        $pass2=Crypt::encrypt($req->input('pass2'));
        $use = User::find($id);

        if(Crypt::decrypt($use->password)==$req->input('pass1') && $use->id==$id)
        {
        $use->password=$pass2;
        $use->save();
        $req->session()->flash('status','Password Updated successfully');
        return redirect('profile');
        }
        else
        {
            $req->session()->flash('alert','Your Previous password is incorrect');
            return redirect('profile');
        }
    }
    


}
