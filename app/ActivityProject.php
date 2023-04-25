<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityProject extends Model
{
    protected $guarded = [];

    public function activities(){
        return $this->hasMany('App\Activity');
    }
}
