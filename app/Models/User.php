<?php

namespace App\Models;

use App\Models\Group;
use App\Models\Friendship;
use App\Models\Publication;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    public $timestamps  = false;

    protected $fillable = [
        'id', 
        'name', 
        'email', 
        'password',
        'birthday',
        'image',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'receiver_id')->orderBy('date', 'DESC');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_member');
    }

    public function isCreatorOf($group)
    {
        return ($group->creator_id == $this->id);
    }

    public function hasBeenInvitedToGroup($group_id)
    {

        $group = Group::find($group_id);

        return ($group->members->contains($this));
    }
   
     public function cards() {
      return $this->hasMany('App\Models\Card');
    }

    function friendsOfMine()
    {
        return $this->belongsToMany(User::class, Friendship::class, 'sender_id', 'receiver_id')
            ->wherePivot('friendship_state', '=', "accepted");
    }

    function friendOf()
    {
        return $this->belongsToMany(User::class, Friendship::class, 'receiver_id', 'sender_id')
            ->wherePivot('friendship_state', '=', "accepted");
    }

    public function getFriendsAttribute()
    {
        if (!array_key_exists('friends', $this->relations)) {
            $friends = $this->friendsOfMine->merge($this->friendOf);
            $this->setRelation('friends', $friends);
        }
        return $this->getRelation('friends');
    }

    public function friends_with($friend_id,$user_id) {
        return Friendship::where('sender_id', $friend_id)->where('receiver_id', $user_id)
            ->orWhere('receiver_id', $friend_id)->where('sender_id', $user_id)->count()==0;
    }

    
}
