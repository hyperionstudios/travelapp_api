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
}
