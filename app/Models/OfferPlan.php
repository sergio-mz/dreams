<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferPlan extends Model
{
    use HasFactory;

     //relacion uno a muchos (inversa)
     public function plan(){
        return $this->belongsTo('App\Models\Plan');
    }
}
