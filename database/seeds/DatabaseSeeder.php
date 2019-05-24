<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // TODO: Customers
        factory( \App\User::class , 100 )->create();

        factory( \App\Destination::class , 20 )->create();
        factory( \App\Place::class , 500 )->create();
        factory( \App\Image::class , 1500 )->create();
        factory( \App\Review::class , 1500 )->create();

    }
}
