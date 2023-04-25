<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeementType extends Model
{
    protected $guarded = [];

    public function employee(){
        return $this->hasMany('App\Employee');
    }
}
