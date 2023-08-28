@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="container">
        <h1 class="text-2xl font-semibold mb-4">Roles</h1>
        <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Crear Rol</a>

        <table class="table">
            <thead class="bg-gray-200">
                <tr>
                    <th class="text-uppercase text-muted font-weight-bold align-middle">Rol</th>
                    <th class="text-center text-uppercase text-muted" style="width: 100px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr class="bg-white border">
                        <td class="align-middle">
                            <ul class="list-unstyled mb-1 pl-2">
                                <li><strong><a href="{{ route('roles.show', $role) }}">{{ $role->name }}</a></strong></li>
                            </ul>
                        </td>
                        <td class="align-middle">
                            <div class="d-flex justify-content-end">
                                @if ($role->id != 1)
                                    <a href="{{ route('roles.edit', $role) }}"
                                        class="btn btn-warning btn-sm mr-2">Editar</a>
                                    <form action="{{ route('roles.destroy', $role) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Estás seguro de eliminar este role?')">Eliminar</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $roles->links() }}
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
