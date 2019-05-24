<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PlaceResource;
use App\Http\Resources\PlacesResource;
use App\Http\Resources\ReviewsResource;
use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Prophecy\Doubler\LazyDouble;

class PlaceController extends Controller
{
    /**
     * @return PlacesResource
     */
    public function index()
    {
        return new PlacesResource( Place::with(['images' , 'reviews'])->paginate( env('PLACE_PER_PAGE') ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param $id
     * @return PlaceResource
     */
    public function show($id)
    {
        return new PlaceResource( Place::with(['images' , 'reviews'])->where( 'id' , $id )->get() );
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

    /**
     * @param $id
     * @return ReviewsResource
     */
    public function reviews( $id ){
        $place = Place::find( $id );
        return new ReviewsResource( $place->reviews()->paginate( env('REVIEW_PER_PAGE') ) );
    }
}
