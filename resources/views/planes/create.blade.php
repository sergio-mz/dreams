@extends('adminlte::page')

@section('title', 'Planes')

@section('content_header')
    <h1></h1>
@stop

@section('content')

<div class="container">
    <h1 class="mb-4">Crear Nuevo Plan</h1>
    <a href="{{ route('planes.index') }}" class="btn btn-secondary mb-2">Volver a Planes</a>
    <form action="{{ route('planes.store') }}" method="POST">
        @csrf {{-- Agrega un input oculto con un token para temas de seguridad --}}
        
        <div class="mb-3">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="status" class="form-label">Estado:</label>
            <select name="status" id="status" class="form-select">
                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactivo</option>
            </select>
            @error('status')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="price" class="form-label">Precio:</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price') }}">
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="description" class="form-label">Descripción:</label>
            <textarea name="description" id="description" class="form-control" rows="5">{{ old('description') }}</textarea>
            @error('description')
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
