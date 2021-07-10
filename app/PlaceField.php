<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceField extends Model
{
    public $timestamps = false;

    public $fillable = array(
        'place_id', 'field_id'
    );


}
