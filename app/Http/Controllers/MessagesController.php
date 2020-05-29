<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;

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
    public function actionedit(Request $request, $id)
    {

        DB::table('messages')->where('id',$id)
            ->update(['status' => 0]);
            return redirect('messageList');

    }
   
}
