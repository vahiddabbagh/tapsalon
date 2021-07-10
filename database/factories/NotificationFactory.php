<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Notification;
use Faker\Generator as Faker;

$factory->define(Notification::class, function (Faker $faker) {
    return [
        'complex_id' => App\Complex::all('id')->random(),
        'user_id' => App\User::all('id')->random(),
        'title' => FakerPersian::sentence(),
        'description' => FakerPersian::paragraph(),
        'type' => App\NotificationType::all('id')->random()
    ];
});
