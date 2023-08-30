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

    //relacion muchos a muchos
    public function plans()
    {
        return $this->belongsToMany('App\Models\Plan');
    }

    //relacion muchos a muchos
    public function bookings()
    {
        return $this->belongsToMany('App\Models\Booking')
            ->withPivot('price');
    }

    public function scopeAvailableForDates($query, $startDate, $endDate)
    {
        return $query->whereDoesntHave('reservas', function ($query) use ($startDate, $endDate) {
            $query->whereBetween('start_date', [$startDate, $endDate])
                ->orWhereBetween('end_date', [$startDate, $endDate])
                ->orWhere(function ($query) use ($startDate, $endDate) {
                    $query->where('start_date', '<=', $startDate)
                        ->where('end_date', '>=', $endDate);
                });
        });
    }
}
