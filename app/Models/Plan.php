<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $guarded = [];

    //relacion uno a muchos (inversa)
    public function dome()
    {
        return $this->belongsTo('App\Models\Dome');
    }

    //relacion muchos a muchos
    public function services()
    {
        return $this->belongsToMany('App\Models\Service');
    }

    //relacion muchos a muchos
    public function bookings()
    {
        return $this->belongsToMany('App\Models\Booking')
            ->withPivot('price');
    }

    public function scopeAvailableForDates($query, $fechaInicio, $fechaFin)
    {
        return $query->where('status', 1)
            ->whereDoesntHave('bookings', function ($query) use ($fechaInicio, $fechaFin) {
                $query->whereBetween('start_date', [$fechaInicio, $fechaFin])
                    ->orWhereBetween('end_date', [$fechaInicio, $fechaFin])
                    ->orWhere(function ($query) use ($fechaInicio, $fechaFin) {
                        $query->where('start_date', '<=', $fechaInicio)
                            ->where('end_date', '>=', $fechaFin);
                    });
            })
            ->WhereDoesntHave('dome.bookings', function ($query) use ($fechaInicio, $fechaFin) {
                $query->whereBetween('start_date', [$fechaInicio, $fechaFin])
                    ->orWhereBetween('end_date', [$fechaInicio, $fechaFin])
                    ->orWhere(function ($query) use ($fechaInicio, $fechaFin) {
                        $query->where('start_date', '<=', $fechaInicio)
                            ->where('end_date', '>=', $fechaFin);
                    });
            });
    }
}
