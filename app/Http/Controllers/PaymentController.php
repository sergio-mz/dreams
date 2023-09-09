<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\PayMethod;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Payment::orderBy('id', 'asc')->paginate();
        return view('pagos.index', compact('pagos'));
    }

    public function activeBookings()
    {
        $reservas = Booking::all();
        return view('pagos.create', compact('reservas'));
        /* return 'hola'; */
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'booking_id' => 'required',
        ]);

        $esta_reserva = Booking::find($request->booking_id);
        $abonos = $esta_reserva->payments()->sum('value');
        $saldo = $esta_reserva->total - $abonos;

        $reservas = Booking::all();
        $metodos = PayMethod::all();

        return view('pagos.create', compact('esta_reserva', 'reservas', 'abonos', 'saldo', 'metodos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'partial' => 'lte:' . $request->saldo,
        ]);

        $value = $request->total;

        if ($request->total == 'partial') {
            $value = $request->partial;
        }

        if ($value > 0) {
            $pago = Payment::create([
                'booking_id' => $request->booking_id,
                'pay_method_id' => $request->pay_method_id,
                'value' => $value,
            ]);

            return redirect()->route('pagos.show', $pago->id);
        } else {
            return redirect()->route('pagos.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $pago)
    {
        return view('pagos.show', ['pago' => $pago]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $pago)
    {
        $pago->delete();

        return redirect()->route('pagos.index');
    }
}
