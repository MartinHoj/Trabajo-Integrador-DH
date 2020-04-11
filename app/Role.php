<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'role_id';
    protected $guarded = [];


    public function getUsers()
    {
        return $this->hasMany('App/User','role_id');
    }
}
