@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="container">
        <h1 class="mb-4">Detalles:</h1>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary mb-2">Volver a Roles</a>
        <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning mb-2">Editar Rol</a>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Nombre</strong></h5>
            <p class="card-text">{{ $role->name }}</p>
        </div>

        <div class="card mb-1 p-2 pl-4">
            <h5 class="card-title"><strong>Estado</strong></h5>
            <p class="card-text">{{ $role->status == 1 ? 'Activo' : 'Inactivo' }}</p>
        </div>

        <div class="card mb-3 p-3">
            <h5 class="card-title"><strong>Permisos Asignados</strong></h5>
            <ul>
                @foreach ($role->permissions as $permission)
                    <li>{{ $permission->name }}</li>
                @endforeach
            </ul>
        </div>

        <form action="{{ route('roles.destroy', $role) }}" method="POST" class="mt-2">
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
