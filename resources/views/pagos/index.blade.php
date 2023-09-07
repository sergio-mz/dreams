@extends('adminlte::page')

@section('title', 'Pagos')

@section('content_header')
    <h1></h1>
@stop

@section('content')

<div class="container">
    <h1 class="text-2xl font-semibold mb-4">Pagos</h1>

    @can('pagos.create')
        <a href="{{ route('pagos.create') }}" class="btn btn-primary mb-3">Crear Pago</a>
    @endcan
    
    <table class="table">
        <thead class="bg-gray-200">
            <tr>
                <th class="text-uppercase text-muted font-weight-bold align-middle">Pago</th>
                <th class="text-center text-uppercase text-muted" style="width: 100px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pagos as $pago)
                <tr class="bg-white border">
                    <td class="align-middle">
                        <ul class="list-unstyled mb-1 pl-2">
                            <li><strong><a href="{{ route('pagos.show', $pago) }}">{{ $pago->name }}</a></strong></li>
                        </ul>
                    </td>
                    <td class="align-middle">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('pagos.edit', $pago) }}" class="btn btn-warning btn-sm mr-2">Editar</a>
                            <form action="{{ route('pagos.destroy', $pago) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este Pago?')">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $pagos->links() }}
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop