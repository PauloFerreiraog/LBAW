<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Friendship;
use App\Models\User;

class FriendController extends Controller
{

    public function addfriend($id) {
        

       // $this->authorize('create', FriendRequest::class);
        
        $friendship = new Friendship();
        $friendship->sender_id=Auth::id();
        $friendship->receiver_id=$id;
        $friendship->friendship_state='accepted';

        $friendship->save();
        return back();
    }

    public function deletefriend($id){

        $delete = DB::table('friendship')->where('sender_id', $id)->where('receiver_id', Auth::id())
      ->orWhere('receiver_id', $id)->where('sender_id', Auth::id())->delete();

       return back();
    }
    
    public function getFriends(){

      //if (!Auth::check()) return redirect('/login');
      //$this->authorize('list', Group::class);
      $users=User::all();
      
      $friends= array();

      foreach($users as $user){
            if(!(Auth::user()->friends_with($user->id,Auth::id())) && Auth::user()!=$user){
            array_push($friends,$user);
             }
    
        
     } 

      return view('pages.friends', ['friends' => $friends]);
      
    }



  


}
    

   


