<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ostan extends Model
{
    public $timestamps = false;

    public function cities()
    {
        return $this->hasMany('App\City');
    }

}
