@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1></h1>
@stop

@section('plugins.Chartjs', true)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-semibold mb-4">Indicadores</h1>
                <div class="row align-items-center">
                    <div class="col-md-6" style="height: 300px;">
                        <canvas id="reservasMes"></canvas>
                    </div>
                    <div class="col-md-6" style="height: 300px;">
                        <canvas id="reservasDomos"></canvas>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6" style="height: 300px;">
                        <canvas id="topServicios"></canvas>
                    </div>
                    <div class="col-md-6" style="height: 300px;">
                        <canvas id="dias"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>

    <script>
        const grafica1 = document.getElementById('reservasMes');

        var reservasMes = @json($reservasMes);

        new Chart(grafica1, {
            type: 'line',
            data: {
                labels: Object.keys(reservasMes),
                datasets: [{
                    label: 'Reservas por Mes',
                    data: Object.values(reservasMes),
                    borderWidth: 3,
                    backgroundColor: [


                        'rgba(241, 196, 15, 0.8)',
                        'rgba(230, 126, 34, 0.8)',
                        'rgba(231, 76, 60, 0.8)',
                        'rgba(102, 204, 102, 0.8)',
                        'rgba(204, 255, 153, 0.8)',
                        'rgba(39, 174, 96, 0.8)',
                        'rgba(46, 204, 113, 0.8)',
                        'rgba(52, 152, 219, 0.8)',
                        'rgba(155, 89, 182, 0.8)',
                        'rgba(52, 152, 219, 0.8)',
                    ],
                    borderColor: 'black'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const grafica2 = document.getElementById('reservasDomos');

        var reservasDomos = @json($reservasDomos);

        new Chart(grafica2, {
            type: 'bar',
            data: {
                labels: Object.keys(reservasDomos),
                datasets: [{
                    label: 'Reservas por Domo',
                    data: Object.values(reservasDomos),
                    borderWidth: 3,
                    backgroundColor: [
                        'rgba(46, 139, 87, 0.8)', // Verde pastel oscuro
                        'rgba(60, 179, 113, 0.8)',
                        'rgba(84, 199, 119, 0.8)',
                        'rgba(106, 210, 138, 0.8)',
                        'rgba(128, 219, 152, 0.8)',
                        'rgba(150, 228, 168, 0.8)',
                        'rgba(172, 237, 183, 0.8)',
                        'rgba(194, 246, 199, 0.8)',
                        'rgba(216, 255, 215, 0.8)', // Verde pastel claro
                        'rgba(240, 255, 240, 0.8)'
                    ],
                    borderColor: 'black'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const grafica3 = document.getElementById('topServicios');

        var services = @json($services);

        new Chart(grafica3, {
            type: 'bar',
            data: {
                labels: Object.keys(services),
                datasets: [{
                    label: 'Servicios',
                    data: Object.values(services),
                    borderWidth: 3,
                    backgroundColor: [
                        'rgba(155, 89, 182, 0.8)',
                        'rgba(52, 152, 219, 0.8)',
                        'rgba(231, 76, 60, 0.8)',
                        'rgba(230, 126, 34, 0.8)',
                        'rgba(231, 76, 60, 0.8)',
                        'rgba(102, 204, 102, 0.8)',
                        'rgba(204, 255, 153, 0.8)',
                        'rgba(241, 196, 15, 0.8)',
                    ],
                    borderColor: 'black',
                    hoverOffset: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const grafica4 = document.getElementById('dias');

        var reservaDia = @json($reservaDia);

        new Chart(grafica4, {
            type: 'line',
            data: {
                labels: Object.keys(reservaDia),
                datasets: [{
                    label: 'Reservas Diarias',
                    data: Object.values(reservaDia),
                    borderWidth: 3,
                    backgroundColor: [
                        'rgba(155, 89, 182, 0.8)',
                        'rgba(52, 152, 219, 0.8)',
                        'rgba(241, 196, 15, 0.8)',
                        'rgba(230, 126, 34, 0.8)',
                        'rgba(231, 76, 60, 0.8)',
                        'rgba(102, 204, 102, 0.8)',
                        'rgba(204, 255, 153, 0.8)'
                    ],
                    borderColor: 'black',
                    hoverOffset: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@stop
