<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ostan;
use Faker\Generator as Faker;

$factory->define(Ostan::class, function (Faker $faker) {
    return [
        'name' => FakerPersian::state(),
        'description' =>FakerPersian::paragraph(),
        'no_users' => $faker->numberBetween(1,10000)
    ];
});
