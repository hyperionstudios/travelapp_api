<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'content' , 'written_date' , 'rating' ,
        'user_id' , 'place_id' ,
    ];

    public function place(){
        return $this->belongsTo( Place::class );
    }

    public function reviewer(){
        return $this->belongsTo( User::class );
    }
}
