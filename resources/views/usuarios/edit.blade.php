@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1></h1>
@stop

@section('content')

<div class="container">
    <h1 class="mb-4">Editar Usuario: {{ $usuario->name }} {{ $usuario->last_name }}</h1>
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary mb-2">Volver a Usuarios</a>
    <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
        @csrf {{-- Agrega un input oculto con un token para temas de seguridad --}}
        @method('put') {{-- Como HTML no entiende el método "put", aquí lo especifico --}}

        <div class="mb-2">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $usuario->name) }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="email" class="form-label">Correo:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $usuario->email) }}">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="text" name="password" id="password" class="form-control">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Rol:</label>
            <div>
                @foreach($roles as $role)
                    <label class="role-label">
                        <input type="radio" name="role" value="{{ $role->id }}"
                            {{ $usuario->roles->contains($role->id) ? 'checked' : '' }}>
                        {{ $role->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
    </form>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop