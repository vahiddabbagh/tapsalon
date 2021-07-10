<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all('id')->random(),
        'complex_id' => App\Complex::all('id')->random(),
        'rate' => $faker->numberBetween(0,5),
        'content' => FakerPersian::paragraph(),
    ];
});
