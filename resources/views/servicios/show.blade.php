@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="container">
        <h1 class="mb-4">Detalles:</h1>
        @can('servicios.index')
            <a href="{{ route('servicios.index') }}" class="btn btn-secondary mb-2">Volver a Servicios</a>
        @endcan
        @can('servicios.edit')
            <a href="{{ route('servicios.edit', $servicio) }}" class="btn btn-warning mb-2">Editar Servicio</a>
        @endcan
        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Nombre</strong></h5>
            <p class="card-text">{{ $servicio->name }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Precio</strong></h5>
            <p class="card-text">$ {{ number_format($servicio->price, 0, ',', '.') }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Estado</strong></h5>
            <p class="card-text">{{ $servicio->status == 1 ? 'Activo' : 'Inactivo' }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Descripción</strong></h5>
            <p class="card-text">{{ $servicio->description }}</p>
        </div>

        @can('servicios.destroy')
            <form action="{{ route('servicios.destroy', $servicio) }}" method="POST" class="mt-2">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('¿Estás seguro de eliminar este servicio?')">Eliminar</button>
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
