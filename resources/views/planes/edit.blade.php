@extends('adminlte::page')

@section('title', 'Planes')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="container">
        <h1 class="mb-4">Editar Plan</h1>
        <a href="{{ route('planes.index') }}" class="btn btn-secondary mb-2">Volver a Planes</a>
        <form action="{{ route('planes.update', $plane) }}" method="POST">
            @csrf {{-- Agrega un input oculto con un token para temas de seguridad --}}
            @method('put') {{-- Como HTML no entiende el método "put", aquí lo especifico --}}

            <div class="mb-2">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $plane->name) }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-2">
                <label for="status" class="form-label mr-3">Estado:</label>
                <select name="status" id="status" class="form-select">
                    <option value="1" {{ $plane->status === 1 ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ $plane->status === 0 ? 'selected' : '' }}>Inactivo</option>
                </select>
                @error('status')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Precio:</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01"
                    value="{{ old('price', $plane->price) }}">
                @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-2">
                <label for="description" class="form-label">Descripción:</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $plane->description) }}</textarea>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Domo:</label>
                @error('dome_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div>
                    @foreach ($domos as $domo)
                        <label class="domo-label">
                            <input type="radio" name="dome_id" value="{{ $domo->id }}"
                                {{ $plane->dome_id == $domo->id ? 'checked' : '' }}>
                            {{ $domo->name }}
                        </label>
                        <br>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label>Servicios:</label>
                <div>
                    @foreach ($servicios as $servicio)
                        <label class="servicio-label">
                            <input type="checkbox" name="servicios[]" value="{{ $servicio->id }}"
                                {{ $plane->services->contains($servicio->id) ? 'checked' : '' }}>
                            {{ $servicio->name }}
                        </label>
                        <br>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar plan</button>
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
