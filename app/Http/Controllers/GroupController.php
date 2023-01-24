<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Publication;
use App\Models\Friendship;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class GroupController extends Controller
{
    public function getGroups(){

      //if (!Auth::check()) return redirect('/login');
      //$this->authorize('list', Group::class);
      $groups = Group::all();
      return view('pages.groups', ['groups' => $groups]);
      
    }

    public function show($id)
    {

        if (!ctype_digit($id)) {
            abort(404);
        }
        $group = Group::find($id);

        $users = $group->members()->get();      

        $publications = $group->publications()->get()->sortByDesc('date');

        return view('pages.group_page', ['group' => $group,'publications' => $publications, 'friends' => $users]);
    }

    
    public function getMembers($id)
    {

        if (!ctype_digit($id)) {
            abort(404);
        }
        $group = Group::find($id);

        $members = $group->members()->get();

        return view('pages.group_members', ['members' => $members, 'group' => $group]);
    }


     //Adds a group 
     public function create(Request $request)
     {
             
         //$this->authorize('create', [Group::class, $group_id]);
  
      if($request->image != null){
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('img'), $imageName);
      }else{
        $imageName = 'young.png';
      }
    
    
        $group = Group::create([
          'name' => $request->name,
          'creator_id' => Auth::user()->id,
          'image' => 'img/' . $imageName
        ]);

        if ($group) {

          $members = [];
          $members[] = auth()->user()->id;

          $group->members()->sync($members);

          $group->members()->updateExistingPivot(auth()->user()->id, [
              'membership_state' => 'accepted',
          ]);
        }

        $group->save();
    
        return back();
     }

     //Deletes a group
    public function remove(Request $request, $group_id, $user_id)
    {
     if (!ctype_digit($group_id)) {
       abort(404);
     }

     $group = Group::find($group_id);
     $user = User::find($user_id);
 
     //$this->authorize('remove', $user_id, $group_id);

     $group->members()->updateExistingPivot($user_id, [
      'membership_state' => 'rejected',
    ]);

     return back();
    }


   public function search(Request $request, $group_id){
    // Get the search value from the request
    $search = $request->input('search');
    
    $group = Group::find($group_id);

    // Search in the title and body columns from the posts table
    $users = User::query()
        ->where('name', 'LIKE', "%{$search}%")
        ->orWhere('email', 'LIKE', "%{$search}%")
        ->get();

    // Return the search view with the resluts compacted
    return view('pages.group_search', compact('users'), ['group' => $group]);
  }

  public function addMember(Request $request, $group_id, $user_id){

    $group = Group::find($group_id);
    $user = User::find($user_id);

    $group->members()->attach($user);
    $group->members()->updateExistingPivot($user_id, [
      'membership_state' => 'accepted',
    ]);

    $group->save(); 
    
    return back();
  }

}
