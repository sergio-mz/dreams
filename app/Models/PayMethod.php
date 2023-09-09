<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayMethod extends Model
{
    use HasFactory;

    //relacion uno a muchos
    public function payments()
    {
        return $this->hasMany('App\Models\Payment');
    }
    
    /* protected $fillable = ['name', 'descripcion','categoria']; */ /* aqui campos que quiero guardar */
    protected $guarded = []; /* aqui campos que no quiero q guarde */
}
