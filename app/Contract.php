<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $guarded = [];

    public function projects (){

        return $this->hasMany('App\Project');
    }
}
