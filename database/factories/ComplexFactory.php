<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Complex;
use Faker\Generator as Faker;

$factory->define(Complex::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all('id')->random(),
        'ostan_id' => App\Ostan::all('id')->random(),
        'city_id' => App\City::all('id')->random(),
        'region_id' => App\Region::all('id')->random(),
       // 'media_id' => App\media::all('id')->random(),
        'name' => FakerPersian::sentence(),
        'excerpt' => FakerPersian::sentence(),
        'about' => FakerPersian::paragraph(),
        'address' => FakerPersian::address(),
        'likes_no' => $faker->numberBetween(1,1000),
        'visits_no' => $faker->numberBetween(1,1000),
        'stars' => $faker->numberBetween(1,5),
        'phone' => FakerPersian::mobile(),
        'mobile' => FakerPersian::mobile(),
        'latitude' => 38.070736,
        'longitude' => 46.294011,
    ];
});
