<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dome extends Model
{
    use HasFactory;

    protected $guarded = [];

    //relacion muchos a muchos
    public function characteristics(){
        return $this->belongsToMany('App\Models\Characteristic');
    }

    //relacion muchos a muchos
    public function plans(){
        return $this->belongsToMany('App\Models\Plan');
    }

    //relacion uno a muchos
    public function bookingDomes(){
        return $this->hasMany('App\Models\BookingDome');
    }
}
