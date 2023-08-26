@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="container">
        <h1 class="mb-4">Detalles:</h1>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary mb-2">Volver a Clientes</a>
        <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning mb-2">Editar Cliente</a>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Cédula</strong></h5>
            <p class="card-text">{{ $cliente->document }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Nombre</strong></h5>
            <p class="card-text">{{ $cliente->name }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Apellido</strong></h5>
            <p class="card-text">{{ $cliente->last_name }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Correo</strong></h5>
            <p class="card-text">{{ $cliente->email }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Celular</strong></h5>
            <p class="card-text">{{ $cliente->cellphone }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Fecha de Nacimiento</strong></h5>
            <p class="card-text">{{ $cliente->birthdate }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Ciudad</strong></h5>
            <p class="card-text">{{ $cliente->city }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Dirección</strong></h5>
            <p class="card-text">{{ $cliente->address }}</p>
        </div>

        <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="mt-2">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</button>
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
