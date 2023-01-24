<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Profile;
use App\Models\Publication;
use App\Models\Friendship;


class ProfileController extends Controller
{
    public function getProfile(User $profile_user){

        $publications = Publication::all()->sortByDesc('date');;
        $number_posts = Publication::all()->where('user_id',$profile_user->id)->count();
        $number_friends=Friendship::where('receiver_id', $profile_user->id)
        ->orWhere('sender_id',$profile_user->id)->count();
        return view('pages.profile',['profile_user' => $profile_user,'publications'=>$publications,'number_posts'=>$number_posts,'number_friends'=>$number_friends]);
    }

    public function get_profile($id){

        $profile_user = User::find($id);

        return self::getProfile($profile_user);
    }

}
