<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    $place_id = App\Place::all('id')->random();
    $complex_id = App\Place::find($place_id)->complex->$id;
    return [
        'title' => FakerPersian::sentence(),
    ];
});
