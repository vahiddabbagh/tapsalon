<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PlaceField;
use Faker\Generator as Faker;

$factory->define(PlaceField::class, function (Faker $faker) {
    return [
        'place_id' => App\Place::all('id')->random(),
        'field_id' => App\Field::all('id')->random(),
    ];
});
