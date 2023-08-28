@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1></h1>
@stop

@section('content')

<div class="container">
    <h1 class="mb-4">Editar Característica</h1>
    <a href="{{ route('caracteristicas.index') }}" class="btn btn-secondary mb-2">Volver a Características</a>
    <form action="{{ route('caracteristicas.update', $caracteristica) }}" method="POST">
        @csrf {{-- Agrega un input oculto con un token para temas de seguridad --}}
        @method('put') {{-- Como HTML no entiende el método "put", aquí lo especifico --}}

        <div class="mb-2">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $caracteristica->name) }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="status" class="form-label mr-3">Estado:</label>
            <select name="status" id="status" class="form-select">
                <option value="1" {{ $caracteristica->status === 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ $caracteristica->status === 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
            @error('status')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="description" class="form-label">Descripción:</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $caracteristica->description) }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Precio:</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price', $caracteristica->price) }}">
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Característica</button>
    </form>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop