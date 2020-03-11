<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    protected $primaryKey = 'comment_id';
    protected $guarded = [];

    public function getUser()
    {
        return $this->belongsTo(User::class,'user_id','user_id');
    }
}
