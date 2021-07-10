<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PlaceFacility;
use Faker\Generator as Faker;

$factory->define(PlaceFacility::class, function (Faker $faker) {
    return [
        'place_id' => App\Place::all('id')->random(),
        'facility_id' => App\Facility::all('id')->random(),
    ];
});
