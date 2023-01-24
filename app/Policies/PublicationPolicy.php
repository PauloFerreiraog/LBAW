<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Group;
use App\Models\Publication;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class PublicationPolicy
{
  use HandlesAuthorization;

  public function see_publication(User $user, $publication){

    if ($publication->group == null) {
      return Auth::check();
    }

    $group = Group::find($publication->group->id);

    return $user->groups()->get()->contains($group);
  }

  public function create(User $user, $group_id){

    if ($group_id == null) {
      return Auth::check();
    }

    $group = Group::find($group_id);

    return $user->groups()->get()->contains($group);
  }

  public function delete(User $user, Publication $publication){
    return $user->id == $publication->user_id || $user->isAdmin;
  }

  public function edit(User $user, Publication $publication){
    return $user->id == $publication->user_id;
  }

  public function like(){
    return Auth::check();
  }

  public function comment(){
    return Auth::check();
  }
  
}
