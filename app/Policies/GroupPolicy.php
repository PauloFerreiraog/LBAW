<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Group;
use App\Models\Publication;
use App\Models\Comment;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class GroupPolicy
{
    public function remove(User $user, Group $comment){
    return $user->id == $comment->user_id || $user->isAdmin;
  }
}