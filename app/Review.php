<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'content' , 'written_date' , 'rating' ,
        'user_id' , 'place_id' ,
    ];
}
