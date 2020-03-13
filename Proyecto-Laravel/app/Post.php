<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'post_id';
    protected $guarded = [];


        
    public function getUser()
    {
       return $this->belongsTo(User::class,'user_id','user_id');
    }
    
}
