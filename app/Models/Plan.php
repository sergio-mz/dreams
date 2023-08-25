<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $guarded = [];

    //relacion muchos a muchos
    public function domes()
    {
        return $this->belongsToMany('App\Models\Dome');
    }

    //relacion muchos a muchos
    public function services()
    {
        return $this->belongsToMany('App\Models\Service');
    }

    //relacion uno a muchos
    public function bookingPlans()
    {
        return $this->hasMany('App\Models\BookingPlan');
    }

    //relacion uno a muchos
    public function offerPlans()
    {
        return $this->hasMany('App\Models\OfferPlan');
    }
}
