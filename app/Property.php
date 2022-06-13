<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name', 'latitude', 'longitude', 'type', 'amount', 'city', 'postalCode', 'province', 'description', 'images', 'availability', 'contactNo', 'contatctEmail',
    ];

    public function house()
    {

        return $this->belongsTo(House::class);

    }

    public function apartment()
    {

        return $this->belongsTo(Apartment::class);

    }

    public function user()
    {

        return $this->belongsTo(Admin::class);

    }

    public function offers()
    {

        return $this->hasMany(Offer::class);

    }

    public function reportproperties()
    {

        return $this->hasMany(ReportProperty::class);

    }

    public function favorites()
    {

        return $this->hasMany(Favorite::class);

    }
}
