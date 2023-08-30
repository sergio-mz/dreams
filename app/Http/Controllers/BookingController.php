<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Dome;
use App\Models\Plan;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = Booking::orderBy('name', 'desc')->paginate();
        return view('ingresar-fechas', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $domos = Dome::all(); // Obtener todos los domos
        $servicios = Service::all(); // Obtener todos los servicios
        $planes = Plan::all(); // Obtener todos los planes
        $clientes = Customer::all(); // Obtener todos los clientes
        return view('reservas.create', compact('domos', 'servicios', 'planes', 'clientes'));
    }

    public function getAvailableDomos(Request $request)
    {
        $startDate = Carbon::parse($request->input('start_date'));
        $endDate = Carbon::parse($request->input('end_date'));

        $domosDisponibles = Dome::availableForDates($startDate, $endDate)->get();

        return view('layouts.partials.domos-disponibles', ['domosDisponibles' => $domosDisponibles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'user_id' => 'required',
            'curtomer_id' => 'required',
        ]);

        /* $role = new Role();

        $role->name = $request->name;

        $role->save(); */

        $reserva = Booking::create($request->all()); /*otra forma de hacerlo*/

        return redirect()->route('reservas.show', $reserva->id); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $reserva)
    {
        return view('reservas.show', ['reserva' => $reserva]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $reserva)
    {
        $domos = Dome::all(); // Obtener todos los domos
        $servicios = Service::all(); // Obtener todos los servicios
        $planes = Plan::all(); // Obtener todos los planes
        return view('reservas.edit', compact('reserva', 'domos', 'servicios', 'planes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $reserva)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        /*
        $caracteristica->name = $request->name;
        $caracteristica->status = $request->status;
        $caracteristica->description = $request->description;
        $caracteristica->price = $request->price;

        $caracteristica->save(); */
        
        $array = $request->all();
        Arr::forget($array, 'domos');
        Arr::forget($array, 'servicios');
        $reserva->update($array); /*otra forma de hacerlo*/

        // Actualizar los domos y servicios asignados al Booking
        $reserva->domes()->sync($request->input('domos', []));
        $reserva->services()->sync($request->input('servicios', []));

        return redirect()->route('reservas.show', $reserva->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $reserva)
    {
        $reserva->delete();

        return redirect()->route('reservas.index');
    }
}
