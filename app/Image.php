<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    public $fillable = array(
        'complex_id','place_id','title', 'filename', 'extension'
    );

    protected $appends = ['url'];

    public function getUrlAttribute()
    {
        $complex_id = $this->complex_id;
        $place_id = $this->place_id;
        $filename = $this->filename;
        $extension = $this->extension;
        
        return  array(
            'thumb'=>Storage::disk('photos')->url($complex_id.'/'.$place_id.'/'.$filename.'_150_150.'.$extension),
            'medium'=>Storage::disk('photos')->url($complex_id.'/'.$place_id.'/'.$filename.'_300.'.$extension),
            'large'=>Storage::disk('photos')->url($complex_id.'/'.$place_id.'/'.$filename.'.'.$extension)
        );

    }

}
