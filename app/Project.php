<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function contract(){
        return $this->belongsTo('App\Contract');
    }

    public function sections(){
        return $this->hasMany('App\Section');
    }
}
