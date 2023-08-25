<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingService extends Model
{
    use HasFactory;

    //relacion uno a muchos (inversa)
    public function service(){
        return $this->belongsTo('App\Models\Service');
    }

    //relacion uno a muchos (inversa)
    public function booking(){
        return $this->belongsTo('App\Models\Booking');
    }
}
