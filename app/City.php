<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function regions()
    {
        return $this->hasMany('App\Region');
    }

    public function ostan()
    {
        return $this->belongsTo('App\Ostan');
    }

    public function complexes()
    {
        return $this->complexes;
    }

}
