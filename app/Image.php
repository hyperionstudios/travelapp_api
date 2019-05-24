<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image_url' , 'place_id' ,
    ];

    public function place(){
        return $this->belongsTo( Place::class );
    }
}
