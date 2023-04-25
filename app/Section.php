<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded= [];

    public function project(){
        return $this->belongsTo('App\Project');
    }

    public function locations(){
        return $this->hasMany('App\Location');
    }
}
