@extends('adminlte::page')

@section('title', 'Planes')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="container">
        <h1 class="mb-4">Detalles:</h1>
        <a href="{{ route('planes.index') }}" class="btn btn-secondary mb-2">Volver a Planes</a>
        <a href="{{ route('planes.edit', $plane) }}" class="btn btn-warning mb-2">Editar Plan</a>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Nombre</strong></h5>
            <p class="card-text">{{ $plane->name }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Precio</strong></h5>
            <p class="card-text">$ {{ number_format($plane->price, 0, ',', '.') }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Descripción</strong></h5>
            <p class="card-text">{{ $plane->description }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Estado</strong></h5>
            <p class="card-text">{{ $plane->status == 1 ? 'Activo' : 'Inactivo' }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Domos con este plan</strong></h5>
            <ul>
                @foreach ($plane->domes as $dome)
                    <li>{{ $dome->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Servicios</strong></h5>
            <ul>
                @foreach ($plane->services as $service)
                    <li>{{ $service->name }}</li>
                @endforeach
            </ul>
        </div>

        <form action="{{ route('planes.destroy', $plane) }}" method="POST" class="mt-2">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('¿Estás seguro de eliminar este plane?')">Eliminar</button>
        </form>
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

