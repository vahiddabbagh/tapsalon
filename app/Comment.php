<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $fillable = array(
        'user_id','rate', 'content', 'complex_id'
    );

    protected $hidden = [
        'user_id', 'complex_id'
    ];


    public function complex(){
        return $this->belongsTo('App\Complex');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
