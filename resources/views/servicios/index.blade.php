@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h1></h1>
@stop

@section('plugins.Datatables', true)

@section('content')

    <div class="container">
        <h1 class="text-2xl font-semibold mb-4">Servicios</h1>

        @can('servicios.create')
            <a href="{{ route('servicios.create') }}" class="btn btn-primary mb-3">Crear Servicio</a>
        @endcan

        <div class="card">
            <div class="card-body">

                <table class="table" id="tablaServicios">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="text-uppercase text-muted font-weight-bold align-middle">Servicio</th>
                            <th class="text-center text-uppercase text-muted" style="width: 100px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicios as $servicio)
                            <tr class="bg-white border">
                                <td class="align-middle">
                                    <ul class="list-unstyled mb-1 pl-2">
                                        <li><strong><a
                                                    href="{{ route('servicios.show', $servicio) }}">{{ $servicio->name }}</a></strong>
                                        </li>
                                    </ul>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-end">
                                        @can('servicios.edit')
                                            <a href="{{ route('servicios.edit', $servicio) }}"
                                                class="btn btn-warning btn-sm mr-2">Editar</a>
                                        @endcan
                                        @can('servicios.destroy')
                                            <form action="{{ route('servicios.destroy', $servicio) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Estás seguro de eliminar esta característica?')">Eliminar</button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>

    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tablaServicios').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    info: 'Página _PAGE_ de _PAGES_',
                    infoEmpty: 'Sin registros disponibles',
                    infoFiltered: '(filtrado de _MAX_ registros totales)',
                    lengthMenu: 'Mostrar _MENU_ registros por página',
                    zeroRecords: 'Nada encontrado - disculpa',
                    search: 'Buscar:',
                    paginate: {
                        next: 'Siguiente',
                        previous: 'Anterior'
                    }
                }
            });
        });
    </script>
@stop
