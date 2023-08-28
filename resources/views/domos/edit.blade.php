@extends('adminlte::page')

@section('title', 'Domos')

@section('content_header')
    <h1></h1>
@stop

@section('content')

<div class="container">
    <h1 class="mb-4">Editar Domo</h1>
    <a href="{{ route('domos.index') }}" class="btn btn-secondary mb-2">Volver a Domos</a>
    <form action="{{ route('domos.update', $domo) }}" method="POST">
        @csrf {{-- Agrega un input oculto con un token para temas de seguridad --}}
        @method('put') {{-- Como HTML no entiende el método "put", aquí lo especifico --}}

        <div class="mb-2">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $domo->name) }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="status" class="form-label mr-3">Estado:</label>
            <select name="status" id="status" class="form-select">
                <option value="1" {{ $domo->status === 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ $domo->status === 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
            @error('status')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Precio:</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price', $domo->price) }}">
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="location" class="form-label">Ubicación:</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $domo->location) }}">
            @error('location')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="description" class="form-label">Descripción:</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $domo->description) }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="capacity" class="form-label">Capacidad:</label>
            <input type="number" name="capacity" id="capacity" class="form-control" value="{{ old('capacity', $domo->capacity) }}">
            @error('capacity')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Características:</label>
            <div>
                @foreach($caracteristicas as $caracteristica)
                    <label class="caracteristica-label">
                        <input type="checkbox" name="caracteristicas[]" value="{{ $caracteristica->id }}"
                            {{ $domo->characteristics->contains($caracteristica->id) ? 'checked' : '' }}>
                        {{ $caracteristica->name }}
                    </label>
                    <br>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Domo</button>
    </form>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop