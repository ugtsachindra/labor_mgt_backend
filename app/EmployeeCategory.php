<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeCategory extends Model
{
    protected $guarded = [];

    public function employees(){
        return $this->hasMany('App\Employee');
    }

     public function rates(){
        return $this->hasMany('App\AgreementRate');
     }
}
