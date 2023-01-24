<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'friendship';


    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'friendship_state'
    ];
}
