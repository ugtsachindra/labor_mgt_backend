<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgreementRate extends Model
{
    protected $guarded = [];

    public function agreement(){
        return $this->belongsTo('App\Agreement');
    }

    public function employee_category(){
        return $this->belongsTo('App\EmployeeCategory');
    }
}
