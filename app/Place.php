<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{



    public function complex()
    {
        return $this->belongsTo('App\Complex');
    }

    public function image()
    {
        return $this->hasMany('App\Image');
    }

    public function featured()
    {
        return $this->belongsTo('App\Image', 'image_id');
    }

    public function fields()
    {
        return $this->belongsToMany('App\Field', 'place_fields');
    }

    public function facilities()
    {
        return $this->belongsToMany('App\Facility', 'place_facilities');
    }


    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

    public function place_type()
    {
        return $this->belongsTo('App\PlaceType');
    }   

    public function timings()
    {
        return $this->hasMany('App\Timing');
    }      

    public $fillable = array(
        'complex_id', 'place_type_id', 'media_id', 'title', 'excerpt', 'about', 'price'
    );

        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'complex_id', 'place_type_id', 'media_id'
    ];
    
}
