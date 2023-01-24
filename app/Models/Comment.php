<?php

namespace App\Models;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $table = 'comment';
    protected $primaryKey = 'id';

    public $incrementing = true;
    public $timestamps = false;


    protected $fillable = [
        'user_id',
        'publication_id',
        'content',
        'date',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function publication(){
        return $this->belongsTo(Publication::class, 'publication_id');
    }
}
