<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Destination;
use Faker\Generator as Faker;

$factory->define(Destination::class, function (Faker $faker) {
    return [
        'title' => $faker->country,
        'featured_image'    => $faker->imageUrl( 800 , 600 , 'city' ),
    ];
});
