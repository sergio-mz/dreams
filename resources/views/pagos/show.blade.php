@extends('adminlte::page')

@section('title', 'Pagos')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="container">
        <h1 class="mb-4">Detalles:</h1>
        <a href="{{ route('pagos.index') }}" class="btn btn-secondary mb-2">Volver a Pagos</a>
        @can('pagos.edit')
        <a href="{{ route('pagos.edit', $pago) }}" class="btn btn-warning mb-2">Editar Pago</a>
        @endcan
        <a href="{{ route('pagos.pdf', $pago) }}" class="btn btn-warning mb-2">PDF</a>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Número de pago</strong></h5>
            <p class="card-text">{{ $pago->id }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Número de reserva</strong></h5>
            <p class="card-text">{{ $pago->booking_id }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Metodo de Pago</strong></h5>
            <p class="card-text">$ {{ $pago->payMethod->name }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Valor</strong></h5>
            <p class="card-text">$ {{ number_format($pago->value, 0, ',', '.') }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Fecha del pago</strong></h5>
            <p class="card-text">{{ $pago->created_at }}</p>
        </div>

        @can('pagos.destroy')
        <form action="{{ route('pagos.destroy', $pago) }}" method="POST" class="mt-2">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('¿Estás seguro de eliminar este pago?')">Eliminar</button>
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

