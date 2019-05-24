<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ReviewResource;
use App\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * @param Request $request
     * @return ReviewResource
     */
    public function store(Request $request)
    {
        $request->validate([
            'content'   => 'required',
            'rating'    => 'required',
            'place_id'  => 'required'
        ]);
        $user = $request->user();
        $review = new Review();
        $review->content = $request->get( 'content' );
        $review->written_date = Carbon::now()->format('Y-m-d H:i:s');
        $review->rating = intval( $request->get( 'rating' ) );
        $review->user_id = $user->id;
        $review->place_id = $request->get( 'place_id' );
        $review->save();
        return new ReviewResource( $review );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
