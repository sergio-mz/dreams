<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dome extends Model
{
    use HasFactory;

    protected $guarded = [];

    //relacion muchos a muchos
    public function characteristics()
    {
        return $this->belongsToMany('App\Models\Characteristic');
    }

    //relacion uno a muchos
    public function plans()
    {
        return $this->hasMany('App\Models\Plan');
    }

    //relacion muchos a muchos
    public function bookings()
    {
        return $this->belongsToMany('App\Models\Booking')
            ->withPivot('price');
    }

    public function scopeAvailableForDates($query, $fechaInicio, $fechaFin)
    {
        return $query->whereDoesntHave('bookings', function ($query) use ($fechaInicio, $fechaFin) {
            $query->whereBetween('start_date', [$fechaInicio, $fechaFin])
                ->orWhereBetween('end_date', [$fechaInicio, $fechaFin])
                ->orWhere(function ($query) use ($fechaInicio, $fechaFin) {
                    $query->where('start_date', '<=', $fechaInicio)
                        ->where('end_date', '>=', $fechaFin);
                });
        })
        ->WhereDoesntHave('plans.bookings', function ($query) use ($fechaInicio, $fechaFin) {
            $query->whereBetween('start_date', [$fechaInicio, $fechaFin])
                ->orWhereBetween('end_date', [$fechaInicio, $fechaFin])
                ->orWhere(function ($query) use ($fechaInicio, $fechaFin) {
                    $query->where('start_date', '<=', $fechaInicio)
                        ->where('end_date', '>=', $fechaFin);
                });
        });
    }

}
