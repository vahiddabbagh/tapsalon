<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $fillable = array(
        'title','description', 'type', 'complex_id', 'user_id'
    );


    public function place()
    {
        return $this->belongsTo('App\Place');
    }
}
