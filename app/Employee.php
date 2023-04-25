<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    public function employee_category(){
        return $this->belongsTo('App\EmployeeCategory');
    }

    public function employee_type(){
        return $this->belongsTo('App\EmployeementType');
    }

    public function agreement(){
        return $this->belongsTo('App\Agreement');
    }

    public function project(){
        return $this->belongsTo('App\Project');
    }

    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }

}
