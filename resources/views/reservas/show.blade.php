@extends('adminlte::page')

@section('title', 'Reservas')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="container">
        <h1 class="mb-4">Detalles:</h1>
        @can('reservas.index')
            <a href="{{ route('reservas.index') }}" class="btn btn-secondary mb-2">Volver a Reservas</a>
        @endcan
        @can('reservas.edit')
            <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-warning mb-2">Editar Reserva</a>
        @endcan

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Cliente</strong></h5>
            <p class="card-text">{{ $reserva->customer->document }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Fecha Inicio</strong></h5>
            <p class="card-text">{{ $reserva->start_date }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Fecha Fin</strong></h5>
            <p class="card-text">{{ $reserva->end_date }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Domos</strong></h5>
            <ul>
                @foreach ($reserva->domes as $dome)
                    <li>{{ $dome->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Servicios</strong></h5>
            <ul>
                @foreach ($reserva->services as $service)
                    <li>{{ $service->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Planes</strong></h5>
            <ul>
                @foreach ($reserva->plans as $plan)
                    <li>{{ $plan->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Usuario</strong></h5>
            <p class="card-text">{{ $reserva->user->name }} ({{ $reserva->user->roles->first()->name }})</p>
        </div>

        @can('reservas.destroy')
            <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" class="mt-2">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('¿Estás seguro de eliminar este reserva?')">Eliminar</button>
            </form>
        @endcan
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
