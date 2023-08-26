@extends('adminlte::page')

@section('title', 'Caracteristicas')

@section('content_header')
    <h1></h1>
@stop

@section('content')

<div class="container">
    <h1 class="text-2xl font-semibold mb-4">Características</h1>
    <a href="{{ route('caracteristicas.create') }}" class="btn btn-primary mb-3">Crear Característica</a>
    
    <table class="table">
        <thead class="bg-gray-200">
            <tr>
                <th class="text-uppercase text-muted font-weight-bold align-middle">Característica</th>
                <th class="text-center text-uppercase text-muted" style="width: 100px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($caracteristicas as $caracteristica)
                <tr class="bg-white border">
                    <td class="align-middle">
                        <ul class="list-unstyled mb-1 pl-2">
                            <li><strong><a href="{{ route('caracteristicas.show', $caracteristica) }}">{{ $caracteristica->name }}</a></strong></li>
                        </ul>
                    </td>
                    <td class="align-middle">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('caracteristicas.edit', $caracteristica) }}" class="btn btn-warning btn-sm mr-2">Editar</a>
                            <form action="{{ route('caracteristicas.destroy', $caracteristica) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta característica?')">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $caracteristicas->links() }}
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop