<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'image_url' => $faker->imageUrl( 800 , 600 , 'city' ),
        'place_id'  => $faker->numberBetween( 1 , 500 ),
    ];
});
