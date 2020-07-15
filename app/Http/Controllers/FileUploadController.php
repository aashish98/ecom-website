<?php
   
namespace App\Http\Controllers;
  use App\Category;
  use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
  
class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUpload()
    {
        return view('fileUpload');
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUploadPost(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required',
            'details' => 'required',
        ]);

  
        $fileName = 'img'.time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('img/products'), $fileName);


        
        $cat = new Category;
        $cat->name=$request->input('name');
        $cat->details=$request->input('details');
        $cat->slug='img'.time();
        $cat->save();

        return back()
            ->with('success','You have successfully upload file.')
            ->with('file',$fileName);
   
    }
    public function fileUploadProductPost(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'description' => 'required',
            
        ]);

  
        $fileName = 'img'.time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('img/products'), $fileName);


        
        $pro = new Product;
        $pro->name=$request->input('name');
        $pro->price=$request->input('price');
        $pro->details=$request->input('detail');
        $pro->description=$request->input('description');
        $pro->cat_id=$request->input('cat_id');
        $pro->slug='img'.time();
        $pro->save();

        return back()
            ->with('success','You have successfully upload file.')
            ->with('fileProduct',$fileName);
   
    }
    function delete($id)
    {
       Product::find($id)->delete();
        return redirect('list');
    }
    
    function edit($id)
    {
        $data=Category::find($id);
        return view('/edit',['data'=>$data]);
    }
    function editProduct($id)
    {
        $data=Product::find($id);
        return view('editProduct',['data'=>$data]);
    }
    function update(Request $request)
    {
        
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required',
            'details' => 'required',
        ]);

  
        $fileName = 'img'.time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('img/products'), $fileName);


        
        $cat = Category::find($request->input('id'));
        $cat->name=$request->input('name');
        $cat->details=$request->input('details');
        $cat->slug='img'.time();
        $cat->save();


        $request->session()->flash('status','Category Updated successfully');

        return redirect('list');


    }
    function updateProduct(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required',
            'details' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

  
        $fileName = 'img'.time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('img/products'), $fileName);


        $pro = Product::find($request->input('id'));
        $pro->name=$request->input('name');
        $pro->details=$request->input('details');
        $pro->description=$request->input('description');
        $pro->price=$request->input('price');
        $pro->slug='img'.time();
        $pro->save();


        $request->session()->flash('status','Product Updated successfully');

        return redirect('list');


    }
   
}   