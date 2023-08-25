<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /* protected $primaryKey = 'id'; */ // Indica que 'id' es tu clave primaria al usar un string. Esto se debe a que Laravel asume por defecto que la clave primaria es numérica y autoincremental.
    protected $fillable = ['document','name','last_name','email','cellphone','birthdate','city','address']; /* aqui campos que quiero guardar */
    /* protected $guarded = []; */ /* aqui campos que no quiero q guarde */

    //relacion uno a muchos
    public function bookings(){
        return $this->hasMany('App\Models\Booking');
    }
}
