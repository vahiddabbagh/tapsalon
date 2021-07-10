<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Field;
use Faker\Generator as Faker;

$factory->define(Field::class, function (Faker $faker) {
    return [
        'name' => FakerPersian::word(),
        'excerpt' => FakerPersian::sentence(),
        'description' => FakerPersian::paragraph(),
        'icon' => $faker->word()
    ];
});
