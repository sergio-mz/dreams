<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDome extends Model
{
    use HasFactory;

    //relacion uno a muchos (inversa)
    public function dome(){
        return $this->belongsTo('App\Models\Dome');
    }

    //relacion uno a muchos (inversa)
    public function booking(){
        return $this->belongsTo('App\Models\Booking');
    }
}
