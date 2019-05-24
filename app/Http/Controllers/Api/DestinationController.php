<?php

namespace App\Http\Controllers\Api;

use App\Destination;
use App\Http\Resources\DestinationResource;
use App\Http\Resources\DestinationsResource;
use App\Http\Resources\PlacesResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DestinationController extends Controller
{
    /**
     * @return DestinationsResource
     */
    public function index()
    {
        return new DestinationsResource( Destination::paginate( env('DESTINATION_PER_PAGE') ) );
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
     * @return DestinationResource
     */
    public function show($id)
    {
        return new DestinationResource( Destination::find( $id ) );
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
     * @return PlacesResource
     */
    public function places( $id ){
        $destination = Destination::find( $id );
        return new PlacesResource( $destination->places()->paginate( env('PLACE_PER_PAGE') ) );
    }
}
