<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    //relacion uno a uno
    public function comment(){
        return $this->hasOne('App\Models\Comment');
    }

    //relacion uno a uno
    public function receipt(){
        return $this->hasOne('App\Models\Receipt');
    }

    //relacion uno a muchos
    public function bookingDomes(){
        return $this->hasMany('App\Models\BookingDome');
    }

    //relacion uno a muchos
    public function bookingPlans(){
        return $this->hasMany('App\Models\BookingPlan');
    }

    //relacion uno a muchos
    public function bookingServices(){
        return $this->hasMany('App\Models\BookingService');
    }

    //relacion uno a muchos (inversa)
    public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }

    //relacion uno a muchos (inversa)
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
