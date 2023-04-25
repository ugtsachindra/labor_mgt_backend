<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = [];

    public function agreements(){
        return $this->hasMany('App\Agreement'); 
    }

    public function employees(){
        return $this->hasMany('App\Employee');
    }
}
