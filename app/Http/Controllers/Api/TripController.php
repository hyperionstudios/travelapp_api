<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\TripResource;
use App\Http\Resources\TripsResource;
use App\Place;
use App\Trip;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\Cast\Double;

class TripController extends Controller
{

    /**
     * @param Request $request
     * @return TripsResource
     */
    public function index( Request $request )
    {
        $user = $request->user();
        $trips = $user->trips;
        return new TripsResource( $trips );
    }

    /**
     * @param Request $request
     * @return TripResource
     */
    public function store(Request $request)
    {
        $user = $request->user();
        if( $user->age == null ){
           $request->validate([
               'age'    => 'required',
           ]);
           $user->age = $request->get( 'age' );
        }
        if( $user->address == null ){
            $request->validate([
                'address'   => 'required',
            ]);
            $user->address = $request->get( 'address' );
        }
        if( $user->phone == null ){
            $request->validate([
                'phone' => 'required'
            ]);
            $user->phone = $request->get( 'phone' );
        }

        $request->validate([
            'booking_date'  => 'required',
            'payment_status'    => 'required',
            'trip_days' => 'required',
            'trip_date' => 'required',
            'place_id'  => 'required',
        ]);

        $user = $request->user();
        $trip = new Trip();
        $place = Place::find($request->get( 'place_id' ));
        $trip->user_id  = $user->id;
        $trip->place_id = $place->id;

        $cost = $place->cost;
        $finalCost = doubleval( $cost ) * intval( $request->get( 'trip_days' ) );
        $trip->final_cost = $finalCost;

        if( $request->has('payment_reference') ){
            $trip->payment_reference = $request->get( 'payment_reference' );
        }
        if( $request->has('paid_date') ){
            $trip->paid_date = $request->get( 'paid_date' );
        }

        $trip->booking_date = $request->get( 'booking_date' );
        $trip->payment_status = $request->get( 'payment_status' );
        $trip->trip_days = $request->get( 'trip_days' );
        $trip->trip_date = $request->get( 'trip_date' );
        $user->save();
        $trip->save();
        return new TripResource( $trip );
    }


    /**
     * @param Request $request
     * @param $id
     * @return TripResource|array
     */
    public function show( Request $request , $id)
    {
        $user = $request->user();
        $trip = Trip::find( $id );
        if( $user->id != $trip->user_id ){
            return [
                'error' => true,
                'message'   => 'user does not own the trip'
            ];
        }
        return new TripResource( $trip );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
