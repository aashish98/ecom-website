<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use Config;
Use App\AdminSettings;

use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    public function submit(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required'
        ]);
        // return 'SUCCESS';
        $message = new Message;
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->message = $request->input('message');
        
        //save message
        $message->save();

        //redirect
        return redirect('/')->with('success','Message sent.');
    }   
    public function getMessages()
    {
        $messages = Message::all();
        return view('messageList')->with('messages',$messages);
    }
    public function getTax()
    {
        $value = config('cart.tax');
        return view('tax')->with(['value'=>$value]);
    }
    public function setTax(Request $req)
    {
        $this->validate($req, [ 
            'tax'=>'required | min:1 | max:100 '
           ]);
          
        $val = $req->input('tax');
        $conTax = AdminSettings::where('label','config.tax')->first();
        if(empty($conTax))
        {
            $conTax = new AdminSettings;
            $conTax->label="config.tax";
        }
        $conTax->value=$val;
        $conTax->save();
        return view('tax')->with(['success'=>'updated successfully', 'value'=>$val]);
        
    }
    public function actionedit(Request $request, $id)
    {

        DB::table('messages')->where('id',$id)
            ->update(['status' => 0]);
            return redirect('messageList');

    }
    
   
}
