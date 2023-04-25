<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [];

    public function section(){
        return $this->belongsTo('App\Section');
    }

    public function rates(){
        return $this->hasMany('App\EmployeeActivity');
    }

}
