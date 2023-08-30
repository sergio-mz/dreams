@extends('adminlte::page')

@section('title', 'Reservas')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="container">
        <h1 class="mb-4">Crear Nueva Reserva</h1>
        <a href="{{ route('reservas.index') }}" class="btn btn-secondary mb-2">Volver a Reservas</a>
        <form action="{{ route('reservas.store') }}" method="POST">
            @csrf {{-- Agrega un input oculto con un token para temas de seguridad --}}

            <div class="mb-2">
                <label for="start_date" class="form-label">Fecha Inicio:</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}">
                @error('start_date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-2">
                <label for="start_date" class="form-label">Fecha Inicio:</label>
                <input type="date" name="start_date" id="start_date" class="form-control"
                    value="{{ old('start_date') }}">
                @error('start_date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-2">
                <label for="customer_id" class="form-label">Cliente:</label>
                <select name="customer_id" id="customer_id" class="form-control chosen-select">
                    <option value="">Cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->document }}</option>
                    @endforeach
                </select>
                @error('customer_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-2">
                <label for="domes" class="form-label">Domos:</label>
                <select name="domes[]" id="domes" class="form-control chosen-select" multiple>
                    @foreach ($domos as $domo)
                        <option value="{{ $domo->id }}">{{ $domo->name }}</option>
                    @endforeach
                </select>
                @error('domes')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-2">
                <label for="plans" class="form-label">Planes:</label>
                <select name="plans[]" id="plans" class="form-control chosen-select" multiple>
                    @foreach ($planes as $plane)
                        <option value="{{ $plane->id }}">{{ $plane->name }}</option>
                    @endforeach
                </select>
                @error('plans')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-2">
                <label for="services" class="form-label">Servicios:</label>
                <select name="services[]" id="services" class="form-control chosen-select" multiple>
                    @foreach ($servicios as $servicio)
                        <option value="{{ $servicio->id }}">{{ $servicio->name }}</option>
                    @endforeach
                </select>
                @error('services')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Enviar formulario</button>
        </form>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet" />

    <style>
        /* Estilo personalizado para Chosen */
        .chosen-container-single .chosen-single {
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            padding: 0.375rem 0.75rem;
            height: calc(1.5em + 0.75rem + 2px);
            box-shadow: none;
            font-family: inherit;
            /* Utiliza la fuente heredada de Bootstrap */
            font-size: 1rem;
            /* Utiliza el tamaño de fuente heredado de Bootstrap */
        }

        /* Ajuste para la flecha de Chosen */
        .chosen-container-single .chosen-single abbr {
            border-bottom: none;
        }

        /* Estilo para las opciones de Chosen */
        .chosen-container .chosen-results {
            max-height: 200px;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            background-color: #fff;
            overflow-y: auto;
        }

        /* Estilo para el campo activo de Chosen */
        .chosen-container-active .chosen-single {
            background-color: #fff;
        }

        /* Estilo para el contenedor de opciones activas */
        .chosen-container-active .chosen-results {
            border-color: #ced4da;
        }
    </style>
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>

    <!-- Agrega el script de jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Agrega el script de Chosen -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.chosen-select').chosen({
                placeholder_text_single: 'Selecciona',
                placeholder_text_multiple: 'Selecciona',
                no_results_text: 'No se encontraron resultados'
            });
        });
    </script>

@stop
