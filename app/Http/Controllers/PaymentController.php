<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\PayMethod;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function pdf(Payment $pago)
    {
        $esta_reserva = Booking::find($pago->booking_id);
        $abonos = $esta_reserva->payments()->sum('value');
        $saldo = $esta_reserva->total - $abonos;

        $pdf = Pdf::loadView('pagos.pdf', compact('pago', 'saldo'));
        return $pdf->download('pago.pdf');
        /* return view('pagos.pdf', ['pago' => $pago]); */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $pago)
    {
        $esta_reserva = Booking::find($pago->booking_id);
        $abonos = $esta_reserva->payments()->sum('value') - $pago->value;
        $saldo = $esta_reserva->total - $abonos;

        $metodos = PayMethod::all();
        return view('pagos.edit', compact('pago', 'esta_reserva', 'abonos', 'saldo', 'metodos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $pago)
    {
        $value = $request->total;

        if ($request->total == 'partial') {
            $value = $request->partial;
        }

        if ($value > 0) {
            $pago->update([
                'pay_method_id' => $request->pay_method_id,
                'value' => $value,
            ]);

            return redirect()->route('pagos.show', $pago->id);
        } else {
            return redirect()->route('pagos.index');
        }
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
