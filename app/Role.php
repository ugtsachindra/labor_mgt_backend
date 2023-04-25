<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    public function user_projects(){
        return $this->hasMany('App\UserProjectRole');
    }

    
}
