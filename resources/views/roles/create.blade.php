@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1></h1>
@stop

@section('content')

<div class="container">
    <h1 class="mb-4">Crear Nuevo Rol</h1>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary mb-2">Volver a Roles</a>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf {{-- Agrega un input oculto con un token para temas de seguridad --}}

        <div class="mb-2">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Enviar formulario</button>
    </form>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
