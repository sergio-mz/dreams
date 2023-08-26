@extends('adminlte::page')

@section('title', 'Editar Rol')

@section('content_header')
    <h1></h1>
@stop

@section('content')

<div class="container">
    <h1 class="mb-4">Editar Rol: {{ $role->name }} {{ $role->last_name }}</h1>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary mb-2">Volver a Roles</a>
    <form action="{{ route('roles.update', $role) }}" method="POST">
        @csrf {{-- Agrega un input oculto con un token para temas de seguridad --}}
        @method('put') {{-- Como HTML no entiende el método "put", aquí lo especifico --}}

        <div class="mb-2">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $role->name) }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Permisos:</label>
            <div>
                @foreach($permissions as $permission)
                    <label class="permission-label">
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                            {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                        {{ $permission->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Rol</button>
    </form>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop