<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public $timestamps = false;


public function places()
{
    return $this->belongsToMany('App\Place', 'place_fields');
}
}


