<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    //relacion muchos a muchos
    public function plans(){
        return $this->belongsToMany('App\Models\Plan');
    }

    //relacion uno a muchos
    public function bookingServices(){
        return $this->hasMany('App\Models\BookingService');
    }
        /* protected $fillable = ['name', 'descripcion','categoria']; */ /* aqui campos que quiero guardar */
        protected $guarded = []; /* aqui campos que no quiero q guarde */
}
