@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1></h1>
@stop

@section('content')

<div class="container">
    <h1 class="mb-4">Crear Nuevo Cliente</h1>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary mb-2">Volver a Clientes</a>
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf {{-- Agrega un input oculto con un token para temas de seguridad --}}
        
        <div class="mb-2">
            <label for="document" class="form-label">Cédula:</label>
            <input type="text" name="document" id="document" class="form-control" value="{{ old('document') }}" placeholder="Sin puntos, ni comas">
            @error('document')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="last_name" class="form-label">Apellido:</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}">
            @error('last_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="email" class="form-label">Correo:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Ej. correo@dominio.com">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="cellphone" class="form-label">Celular:</label>
            <input type="text" name="cellphone" id="cellphone" class="form-control" value="{{ old('cellphone') }}" placeholder="Ej. 3105557799">
            @error('cellphone')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="birthdate" class="form-label">Fecha de nacimiento:</label>
            <input type="date" name="birthdate" id="birthdate" class="form-control" value="{{ old('birthdate') }}">
            @error('birthdate')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="city" class="form-label">Ciudad:</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}" placeholder="Medellin">
            @error('city')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Dirección:</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
            @error('address')
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
