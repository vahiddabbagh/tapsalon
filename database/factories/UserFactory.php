<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'fname' => FakerPersian::firstName(),
        'lname' => FakerPersian::lastName(),
        'gender' => $faker->boolean(),
        'role_id' => $faker->numberBetween(1,3),
        //'birth_date' => $faker->dateTime(),
        'phone' => FakerPersian::mobile(),
        'mobile' => FakerPersian::mobile(),
        'no_comments' => $faker->numberBetween(1,100),
        'no_likes' => $faker->numberBetween(1,100),
        'no_reserves' => $faker->numberBetween(1,100),
        'wallet' => $faker->numberBetween(1,10000),
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'ostan_id' => App\Ostan::all('id')->random(),
        'city_id' => App\City::all('id')->random(),     
    ];
});
