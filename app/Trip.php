<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = [
        'user_id', 'place_id',
        'final_cost', 'payment_reference',
        'paid_date', 'booking_date', 'payment_status',
        'trip_days', 'trip_date',
    ];
}
