<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Field;
class Complex extends Model
{

    public $fillable = array(
        'user_id','name', 'excerpt', 'about', 'address', 'phone', 'mobile', 'phone', 'ostan_id', 'city_id', 'region_id', 'image_id', 'longitude', 'latitude'
    );

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'image_id', 'user_id', 'ostan_id', 'city_id', 'region_id'
    ];

    protected $appends = ['fields'];

    public function getFieldsAttribute()
    {
       $ids = $this->places()->with('fields')->get()->pluck('fields.*.id')->collapse()->unique();
        return Field::find($ids);
    }

    public function places()
    {
        return $this->hasMany('App\Place');
    }

    public function ostan()
    {
        return $this->belongsTo('App\Ostan');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    public function featured()
    {
        return $this->belongsTo('App\Image', 'image_id');
    }

    public function image()
    {
        return $this->hasMany('App\Image')->where('place_id', '==', 0);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }


}
