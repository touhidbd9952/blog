<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Category table
    public function category()
    {
        return $this->hasone(Category::class,'id','cat_id');
    }

    //User table
    public function user()
    {
        return $this->hasone(User::class,'id','user_id');
    }
}
