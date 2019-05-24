<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'content'   => $faker->paragraph( 1 ),
        'written_date'  => $faker->dateTime,
        'rating'    => $faker->numberBetween( 1 , 5 ),
        'user_id'   => $faker->numberBetween( 101 , 200 ),
        'place_id'  => $faker->numberBetween( 1 , 500 ),
    ];
});
