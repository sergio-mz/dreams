@extends('adminlte::page')

@section('title', 'Caracteristicas')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="container">
        <h1 class="mb-4">Detalles:</h1>
        @can('caracteristicas.index')
            <a href="{{ route('caracteristicas.index') }}" class="btn btn-secondary mb-2">Volver a Características</a>
        @endcan
        @can('caracteristicas.edit')
            <a href="{{ route('caracteristicas.edit', $caracteristica) }}" class="btn btn-warning mb-2">Editar Característica</a>
        @endcan

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Nombre</strong></h5>
            <p class="card-text">{{ $caracteristica->name }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Precio</strong></h5>
            <p class="card-text">$ {{ number_format($caracteristica->price, 0, ',', '.') }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Estado</strong></h5>
            <p class="card-text">{{ $caracteristica->status == 1 ? 'Activo' : 'Inactivo' }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Descripción</strong></h5>
            <p class="card-text">{{ $caracteristica->description }}</p>
        </div>

        @can('caracteristicas.destroy')
            <form action="{{ route('caracteristicas.destroy', $caracteristica) }}" method="POST" class="mt-2">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('¿Estás seguro de eliminar esta característica?')">Eliminar</button>
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
