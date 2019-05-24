<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Place;
use Faker\Generator as Faker;

$factory->define(Place::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description'   => $faker->paragraph(),
        'cost'  => $faker->numberBetween( 50 , 1500 ),
        'discount'  => $faker->numberBetween( 0 , 15 ),
        'user_id'   => $faker->numberBetween( 1 , 50 ),
        'type'      => $faker->randomElement( [ 'nature' , 'city' , 'water reserve' , 'desert reserve' , 'places to see' ] ),
        'destination_id'    => $faker->numberBetween( 1 , 20 ),
    ];
});
