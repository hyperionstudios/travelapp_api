<?php

use Illuminate\Http\Request;



Route::get( 'destinations' , 'Api\DestinationController@index' );
Route::get( 'destinations/{id}' , 'Api\DestinationController@show' );

Route::get( 'places' , 'Api\PlaceController@index' );
Route::get( 'places/{id}' , 'Api\PlaceController@show' );
Route::get( 'places/destinations/{id}' , 'Api\DestinationController@places' );
Route::get( 'places/reviews/{id}' , 'Api\PlaceController@reviews' );

Route::post('register', 'Api\UserController@store');
Route::post('token', 'Api\UserController@getToken');

Route::middleware('auth:api')->group( function(){
    Route::post( 'update-user/{id}' , 'Api\UserController@update' );
    Route::post( 'trips' , 'Api\TripController@store' );
    Route::get( 'trips' , 'Api\TripController@index' );
    Route::get( 'trips/{id}' , 'Api\TripController@show' );
    Route::post( 'trips/review/{id}' , 'Api\ReviewController@store' );
} );
