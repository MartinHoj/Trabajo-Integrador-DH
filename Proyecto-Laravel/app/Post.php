<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'post_id';
    protected $guarded = [];


        
    public function getUser()
    {
        $this->belongsTo('App/User','user_id');
    }
    
}
