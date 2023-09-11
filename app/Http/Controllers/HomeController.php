<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Dome;
use App\Models\Service;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function __invoke()
    {
        // Obtén la fecha actual
        $currentDate = Carbon::now();

        // Retrocede un año a partir de la fecha actual
        $lastYearDate = $currentDate->copy()->subYear();

        // reservas realizadas por meses en el último año
        $reservasPorMes = Booking::whereBetween('start_date', [$lastYearDate, $currentDate])
            ->selectRaw('DATE_FORMAT(start_date, "%Y-%m") as mes_ano, COUNT(*) as total_reservas')
            ->groupBy('mes_ano')
            ->orderBy('mes_ano', 'asc')
            ->get();

        $reservasMes = [];

        foreach ($reservasPorMes as $reserva) {
            $reservasMes[$reserva->mes_ano] = $reserva->total_reservas;
        }

        // domos y la cantidad de reservas en el último año
        $domosYReservas = Dome::withCount(['bookings' => function ($query) use ($lastYearDate, $currentDate) {
            $query->whereBetween('start_date', [$lastYearDate, $currentDate]);
        }])->orderBy('bookings_count', 'desc') // Ordena por la cantidad de reservas en orden descendente
            ->take(10) // Limita los resultados a los 10 primeros
            ->get();

        $reservasDomos = [];

        foreach ($domosYReservas as $domo) {
            $reservasDomos[$domo->name] = $domo->bookings_count;
        }

        //Top Services
        $topServices = Service::select('services.*')
            ->withCount('bookings')
            ->orderByDesc('bookings_count')
            ->limit(5)
            ->get();

        $services = [];

        foreach ($topServices as $service) {
            $services[$service->name] = $service->bookings_count;
        }


        $reservaPorDia = Booking::select([
            Booking::raw('DAYOFWEEK(start_date) as day_of_week'),
            Booking::raw('COUNT(*) as total_reservations'),
        ])
            ->groupBy('day_of_week')
            ->orderBy('day_of_week')
            ->get();

        // Mapear el número del día de la semana al nombre en español
        $daysInSpanish = [
            1 => 'Domingo',
            2 => 'Lunes',
            3 => 'Martes',
            4 => 'Miércoles',
            5 => 'Jueves',
            6 => 'Viernes',
            7 => 'Sábado',
        ];

        // Reformatear la colección con los nombres de los días en español
        $reservaPorDia = $reservaPorDia->map(function ($item) use ($daysInSpanish) {
            $item->day_of_week = $daysInSpanish[$item->day_of_week];
            return $item;
        });

        $reservaDia = [];

        foreach ($reservaPorDia as $dia) {
            $reservaDia[$dia->day_of_week] = $dia->total_reservations;
        }

        return view('home', compact('reservasMes', 'reservasDomos', 'services', 'reservaDia'));
        /* return $reservaDia; */
    }
}
