<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function getMessages($message_user){
    

        //if (!Auth::check()) return redirect('/login');
        //$this->authorize('list', Group::class);
        $messages = Message::all();

        $message_user_id=$message_user->id;
        
        return view('pages.messages', ['messages' => $messages,'message_user'=>$message_user,'message_user_id'=>$message_user_id]);
        
      }

      public function get_userMessages($id){

        $message_user = User::find($id);
  
        return self::getMessages($message_user);
    }
    
    public function addMessage(Request $request) {
        

      // $this->authorize('create', FriendRequest::class);
  
      
  
      $message = Message::create([
              'sender_id' => Auth::user()->id,
              'receiver_id' => $request->message_user_id,
              'content' => $request->body
          ]);
  
      $message->save();
  
      return back();
  
     }

}
