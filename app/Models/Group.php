<?php

namespace App\Models;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'group';
    protected $primaryKey = 'id';

    public $incrementing = true;
    public $timestamps = false;


    protected $fillable = [
        'name',
        'image',
        'creator_id'
    ];

    public function creator(){
        return User::find($this->creator_id);
    }

    public function members(){
        return $this->belongsToMany(User::class, 'group_member')->where('membership_state','!=', 'rejected');
    }


    public function publications(){
        return $this->hasMany(Publication::class);
    }



    
}
