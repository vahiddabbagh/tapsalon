<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Region;
use Faker\Generator as Faker;

$factory->define(Region::class, function (Faker $faker) {
    return [
        'city_id' => App\City::all('id')->random(),
        'name' => FakerPersian::city(),
        'no_users' => $faker->numberBetween(1,100),
    ];
});
