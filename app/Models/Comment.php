<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //relacion uno a uno (inversa)
    public function booking(){
        return $this->belongsTo('App\Models\Booking');
    }
}
