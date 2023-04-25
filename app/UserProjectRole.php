<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProjectRole extends Model
{
    protected $guarded = [];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function user_project(){
        return $this->belongsTo('App\UserProject');
    }
}
