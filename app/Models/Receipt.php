<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    //relacion uno a muchos (inversa)
    public function payMethod(){
        return $this->belongsTo('App\Models\PayMethod');
    }

    //relacion uno a uno (inversa)
    public function booking(){
        return $this->belongsTo('App\Models\Booking');
    }
    
}
