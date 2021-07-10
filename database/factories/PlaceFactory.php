<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Place;
use Faker\Generator as Faker;

$factory->define(Place::class, function (Faker $faker) {
    return [
       // 'media_id' => App\media::all('id')->random(),
       'complex_id' => App\Complex::all('id')->random(),
       'media_id' => $faker->numberBetween(1,10),
       'place_type_id' => App\PlaceType::all('id')->random(),
       'title' => FakerPersian::sentence(),
        'excerpt' => FakerPersian::sentence(),
        'about' => FakerPersian::paragraph(),
        'price' => $faker->numberBetween(1,10000),
        'img_url' => 'https://tapsalon.ir/wp-content/uploads/2019/03/photo_2019-02-20_10-00-52.jpg',
        'timing' => json_encode([
            [true, true, '12:30', '20:30'],
            [true, false, '12:30', '20:30'],
            [true, true, '12:30', '20:30'],
            [true, true, '12:30', '20:30'],
            [true, false, '12:30', '20:30'],
            [true, true, '12:30', '20:30'],
            [false, true, '12:30', '20:30'],
        ]),
    ];
});
