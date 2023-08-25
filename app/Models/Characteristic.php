<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    use HasFactory;

     /* protected $fillable = ['name', 'descripcion','categoria']; */ /* aqui campos que quiero guardar */
     protected $guarded = []; /* aqui campos que no quiero q guarde */
     
     //relacion muchos a muchos
    public function domes(){
        return $this->belongsToMany('App\Models\Dome');
    }
}
