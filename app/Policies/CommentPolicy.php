<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Group;
use App\Models\Publication;
use App\Models\Comment;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CommentPolicy
{
  use HandlesAuthorization;

  public function create(User $user, $publication_id){

    if ($group_id == null) {
      return Auth::check();
    }

    $publication = Publication::find($publication_id);

    //return $user->groups()->get()->contains($group);
    return true;
  }

  public function delete(User $user, Comment $comment){
    return $user->id == $comment->user_id || $user->isAdmin;
  }

  public function edit(User $user, Comment $comment){
    return $user->id == $comment->user_id;
  }
  
}
