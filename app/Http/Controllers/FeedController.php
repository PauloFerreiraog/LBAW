<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Friendship;
use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Auth;

class FeedController extends Controller
{
    public function index(){

        $publications = Publication::all()->sortByDesc('date');

        $friend_publications= array();
        
        foreach($publications as $publication){     
          if((self::get_friends($publication->user_id) || $publication->user_id==Auth::id()) && !($publication->group_id != null)){
            array_push($friend_publications,$publication);
          }
        }

        //users para chatbar
        $users=User::all();
        
        $friends= array();

        foreach($users as $user){
          if(!(Auth::user()->friends_with($user->id,Auth::id())) && Auth::user()!=$user){
          array_push($friends,$user);
          }           
        }

        //groups para group bar        
        $groups= Auth::user()->groups;

        return view('pages.feed', ['publications' => $friend_publications,'friends'=>$friends,'groups'=>$groups]);
    }

    public function getPublications(){

		  $publications = Publication::all();
    }
    
    public function get_friends($friend_id){

      return Friendship::where('sender_id', $friend_id)->where('receiver_id', Auth::id())
      ->orWhere('receiver_id', $friend_id)->where('sender_id', Auth::id())
      ->exists();

    }
}
