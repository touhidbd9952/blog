<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
   
    protected $guarded = [];

    //users table
    public function user()
    {
        return $this->hasone(User::class,'id','user_id');
    }
    //blog table
    public function post()
    {
        return $this->hasone(Post::class,'id','post_id');
    }
}
