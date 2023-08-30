<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    //relacion muchos a muchos
    public function plans(){
        return $this->belongsToMany('App\Models\Plan');
    }

    //relacion muchos a muchos
    public function bookings(){
        return $this->belongsToMany('App\Models\Booking')
                    ->withPivot('price', 'quantity');
    }
}
