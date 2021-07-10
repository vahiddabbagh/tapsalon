<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceFacility extends Model
{
    public $timestamps = false;
    public $fillable = array(
        'place_id', 'facility_id'
    );
}
