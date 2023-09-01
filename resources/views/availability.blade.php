@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Página Principal</h1>
@stop

@section('content')

<h1>Domos Disponibles</h1>

<form action="{{ route('availability.check') }}" method="POST">
    @csrf
    <label for="start_date">Fecha de Inicio:</label>
    <input type="date" name="start_date" required>

    <label for="end_date">Fecha de Fin:</label>
    <input type="date" name="end_date" required>

    <button type="submit">Verificar Disponibilidad</button>
</form>

@if(isset($startDate) && isset($endDate))
    <h2>Domos disponibles para el período del {{ $startDate }} al {{ $endDate }}:</h2>
    <ul>
        @foreach($availableDomes as $dome)
            <li>{{ $dome->name }}</li>
        @endforeach
    </ul>

@endif
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop