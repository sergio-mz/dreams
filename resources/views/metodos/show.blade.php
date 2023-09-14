@extends('adminlte::page')

@section('title', 'Métodos')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="container">
        <h1 class="mb-4">Detalles:</h1>
        <a href="{{ route('metodos.index') }}" class="btn btn-secondary mb-2">Volver a Métodos</a>
        <a href="{{ route('metodos.edit', $metodo) }}" class="btn btn-warning mb-2">Editar Método</a>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Nombre</strong></h5>
            <p class="card-text">{{ $metodo->name }}</p>
        </div>

        <form action="{{ route('metodos.destroy', $metodo) }}" method="POST" class="mt-2">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('¿Estás seguro de eliminar este rol?')">Eliminar</button>
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
