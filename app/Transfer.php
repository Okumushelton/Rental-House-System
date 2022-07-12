<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = ['property_id', 'house_id', 'apartment_id', 'booking_user', 'Amount'];

}
