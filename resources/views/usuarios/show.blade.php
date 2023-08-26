@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="container">
        <h1 class="mb-4">Detalles:</h1>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary mb-2">Volver a Usuarios</a>
        <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-warning mb-2">Editar Usuario</a>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Id</strong></h5>
            <p class="card-text">{{ $usuario->id }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Nombre</strong></h5>
            <p class="card-text">{{ $usuario->name }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Correo</strong></h5>
            <p class="card-text">{{ $usuario->email }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Rol Asignado</strong></h5>
                @foreach ($usuario->roles as $role)
                    <p class="card-text">{{ $role->name }}</p>
                @endforeach
        </div>

        <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" class="mt-2">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
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
