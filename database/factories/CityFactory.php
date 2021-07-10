<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name' => FakerPersian::city(),
        'description' => FakerPersian::paragraph(),
        'no_users' => $faker->numberBetween(1,10000),
    ];
});
