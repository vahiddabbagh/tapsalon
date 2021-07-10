<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceType extends Model
{
    public function places(){
        return $this->hasMany('App\Place');
    }

    public static function salons()
    {
        return static::find(1)->places();
    }

    public static function bashgahs()
    {
        return static::find(2)->places();
    }

    public static function funComplexes()
    {
        return static::find(3)->places();
    }
}
