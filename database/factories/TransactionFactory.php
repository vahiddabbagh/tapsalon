<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all('id')->random(),
        'amount' => $faker->numberBetween(1,100000),
        'trans_code' => $faker->numberBetween(1,100000),
        'money_flow' => $faker->numberBetween(0,1),
    ];
});
