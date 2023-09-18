<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Dome;
use App\Models\Plan;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = Booking::all();
        return view('reservas.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function availableDomes()
    {
        return view('reservas.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $fechaInicio = $request->input('start_date');
        $fechaFin = $request->input('end_date');

        $domosDisponibles = Dome::availableForDates($fechaInicio, $fechaFin)
            ->get();
        $planesDisponibles = Plan::availableForDates($fechaInicio, $fechaFin)
            ->get();

        $servicios = Service::where('status', '1')->get(); // Obtener todos los servicios
        $clientes = Customer::all(); // Obtener todos los clientes

        return view('reservas.create', compact('domosDisponibles', 'fechaInicio', 'fechaFin', 'servicios', 'planesDisponibles', 'clientes'));
        /* return [$domosDisponibles, $fechaInicio, $fechaFin]; */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'customer_id' => 'required',
            'discount' => 'required',
            'tax' => 'required',
        ]);

        $valordomos = 0;
        $valorplanes = 0;
        $valorservicios = 0;

        $domesWithPrices = [];
        $planesWithPrices = [];
        $servicesWithPricesAndQuantity = [];

        $fechaInicio = Carbon::createFromFormat('Y-m-d', $request->input('start_date'));
        $fechaFin = Carbon::createFromFormat('Y-m-d', $request->input('end_date'));
        $dias = $fechaInicio->diffInDays($fechaFin);

        if (isset($request->domes)) {
            foreach ($request->domes as $dome) {
                $price = Dome::find($dome)->price;
                $valordomos += $price*$dias;
                $domesWithPrices[$dome] = ['price' => $price];
            }
        }

        if (isset($request->plans)) {
            foreach ($request->plans as $plan) {
                $price = Plan::find($plan)->price;
                $valorplanes += $price*$dias;
                $planesWithPrices[$plan] = ['price' => $price];
            }
        }

        if (isset($request->services_q)) {
            foreach ($request->services_q as $service => $quantity) {
                $price = Service::find($service)->price;
                $valorservicios += $price * $quantity;
                $servicesWithPricesAndQuantity[$service] = ['price' => $price, 'quantity' => $quantity];
            }
        }

        $subtotal = $valordomos + $valorplanes + $valorservicios;
        $total = $subtotal * (1 - ($request->discount) / 100) * (1 + ($request->tax) / 100);

        $reserva = Booking::create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'user_id' => Auth::user()->id,
            'customer_id' => $request->customer_id,
            'subtotal' => $subtotal,
            'discount' => $request->discount,
            'tax' => $request->tax,
            'total' => $total,
        ]);

        $reserva->domes()->sync($domesWithPrices);
        $reserva->plans()->sync($planesWithPrices);
        $reserva->services()->sync($servicesWithPricesAndQuantity);

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
        $fechaInicio = $reserva->start_date;
        $fechaFin = $reserva->end_date;
        $domosDisponibles = Dome::availableForDates($fechaInicio, $fechaFin)
            ->get();
        $planesDisponibles = Plan::availableForDates($fechaInicio, $fechaFin)
            ->get();
        $servicios = Service::all(); // Obtener todos los servicios

        return view('reservas.edit', compact('reserva', 'domosDisponibles', 'servicios', 'planesDisponibles'));
        /* return  $reserva->services->where('id', '1')->first()->pivot->quantity; */
    }

    public function getServiceQuantity(Request $request)
    {
        $serviceId = $request->input('serviceId');
        $reservaId = json_decode($request->input('reservaId'));

        $reserva = Booking::find($reservaId);

        // Realiza la consulta para obtener la cantidad del servicio
        $cantidadServicio = $reserva->services->where('id', $serviceId)->first()->pivot->quantity;

        return response()->json(['cantidad' => $cantidadServicio]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $reserva)
    {
        $request->validate([
            'discount' => 'required',
            'tax' => 'required',
        ]);

        $valordomos = 0;
        $valorplanes = 0;
        $valorservicios = 0;

        $domesWithPrices = [];
        $planesWithPrices = [];
        $servicesWithPricesAndQuantity = [];

        if (isset($request->domes)) {
            foreach ($request->domes as $dome) {
                $price = Dome::find($dome)->price;
                $valordomos += $price;
                $domesWithPrices[$dome] = ['price' => $price];
            }
        }

        if (isset($request->plans)) {
            foreach ($request->plans as $plan) {
                $price = Plan::find($plan)->price;
                $valorplanes += $price;
                $planesWithPrices[$plan] = ['price' => $price];
            }
        }

        if (isset($request->services_q)) {
            foreach ($request->services_q as $service => $quantity) {
                $price = Service::find($service)->price;
                $valorservicios += $price * $quantity;
                $servicesWithPricesAndQuantity[$service] = ['price' => $price, 'quantity' => $quantity];
            }
        }

        $subtotal = $valordomos + $valorplanes + $valorservicios;
        $total = $subtotal * (1 - ($request->discount) / 100) * (1 + ($request->tax) / 100);

        $reserva->update([
            'user_id' => Auth::user()->id,
            'subtotal' => $subtotal,
            'discount' => $request->discount,
            'tax' => $request->tax,
            'total' => $total,
        ]);

        $reserva->domes()->sync($domesWithPrices);
        $reserva->plans()->sync($planesWithPrices);
        $reserva->services()->sync($servicesWithPricesAndQuantity);

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
