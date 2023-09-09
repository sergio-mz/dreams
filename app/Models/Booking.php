<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    //relacion uno a uno
    public function comment(){
        return $this->hasOne('App\Models\Comment');
    }

    //relacion uno a muchos
    public function payments(){
        return $this->hasMany('App\Models\Payment');
    }

    //relacion muchos a muchos
    public function domes(){
        return $this->belongsToMany('App\Models\Dome')
                    ->withPivot('price');
    }

    //relacion muchos a muchos
    public function plans(){
        return $this->belongsToMany('App\Models\Plan')
                    ->withPivot('price');
    }

    //relacion muchos a muchos
    public function services(){
        return $this->belongsToMany('App\Models\Service')
                    ->withPivot('price', 'quantity');
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
