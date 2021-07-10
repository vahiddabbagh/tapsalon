<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Facility;
use Faker\Generator as Faker;

$factory->define(Facility::class, function (Faker $faker) {
    return [
        'name' => FakerPersian::word(),
        'excerpt' => FakerPersian::sentence(),
        'description' => FakerPersian::paragraph(),
        'icon' => $faker->word()
    ];
});
