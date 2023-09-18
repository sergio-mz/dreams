@extends('adminlte::page')

@section('title', 'Domos')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="container">
        <h1 class="mb-4">Detalles:</h1>
        @can('domos.index')
            <a href="{{ route('domos.index') }}" class="btn btn-secondary mb-2">Volver a Domos</a>
        @endcan
        @can('domos.edit')
            <a href="{{ route('domos.edit', $domo) }}" class="btn btn-warning mb-2">Editar Domo</a>
        @endcan

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Nombre</strong></h5>
            <p class="card-text">{{ $domo->name }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Precio</strong></h5>
            <p class="card-text">$ {{ number_format($domo->price, 0, ',', '.') }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Ubicación</strong></h5>
            <p class="card-text">{{ $domo->location }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Descripción</strong></h5>
            <p class="card-text">{{ $domo->description }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Capacidad</strong></h5>
            <p class="card-text">{{ $domo->capacity }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Estado</strong></h5>
            <p class="card-text">{{ $domo->status == 1 ? 'Activo' : 'Inactivo' }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Caracteristicas Asignadas</strong></h5>
            <ul>
                @foreach ($domo->characteristics as $characteristic)
                    <li>{{ $characteristic->name }}</li>
                @endforeach
            </ul>
        </div>

        @can('domos.destroy')
            <form action="{{ route('domos.destroy', $domo) }}" method="POST" class="mt-2">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('¿Estás seguro de eliminar este domo?')">Eliminar</button>
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
