<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rolepermission extends Model
{
    use HasFactory;
 
    protected $guarded = [];

     //roles table
     public function role()
     {
         return $this->hasone(Role::class,'id','role_id');
     }
}
