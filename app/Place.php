<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'title', 'description',
        'cost', 'discount',
        'rating', 'user_id',
        'type', 'destination_id',
    ];

    public function images(){
        return $this->hasMany( Image::class );
    }

    public function destination(){
        return $this->belongsTo( Destination::class );
    }

    public function guide(){
        return $this->belongsTo( User::class );
    }

    public function reviews(){
        return $this->hasMany( Review::class );
    }
}
