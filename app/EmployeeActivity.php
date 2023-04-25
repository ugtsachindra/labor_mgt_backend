<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeActivity extends Model
{
    protected $guarded = [];

    public function employee(){

        return $this->belongsTo('App\Employee');
    }

    public function agreement(){
        return $this->belongsTo('App\Agreement');
    }

    public function activity(){
        return $this->belongsTo('App\ActivityProject');
    }

    public function location(){
        return $this->belongsTo('App\Location');
    }
    
}
