<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    protected $guarded = [];

    public function project(){

        return $this->belongsTo('App\Project');
    }

    public function supplier(){

        return $this->belongsTo('App\Suplier');
    }
}
