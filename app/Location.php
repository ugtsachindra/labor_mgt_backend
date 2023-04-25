<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [];

    public function section(){
        return $this->belongsTo('App\Section');
    }

}
