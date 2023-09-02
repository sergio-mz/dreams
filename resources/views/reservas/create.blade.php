@extends('adminlte::page')

@section('title', 'Reservas')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="container">
        <h1 class="mb-4">Crear Nueva Reserva</h1>
        <a href="{{ route('reservas.index') }}" class="btn btn-secondary mb-2">Volver a Reservas</a>


        <form action="{{ route('reservas.create') }}" method="POST">
            @csrf
            <div class="mb-2">
                <label for="start_date" class="form-label">Fecha Inicio:</label>
                <input type="date" name="start_date" id="start_date" class="form-control"
                    value="{{ isset($fechaInicio) ? $fechaInicio : '' }}">
                @error('start_date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-2">
                <label for="end_date" class="form-label">Fecha Fin:</label>
                <input type="date" name="end_date" id="end_date" class="form-control"
                    value="{{ isset($fechaFin) ? $fechaFin : '' }}">
                @error('end_date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Verificar Fechas</button>
        </form>

        @if (isset($fechaInicio) && isset($fechaFin))
            <form action="{{ route('reservas.store') }}" method="POST">
                @csrf

                <div class="mb-2">
                    <label for="start_date" class="form-label" style="display: none;">Fecha Inicio:</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $fechaInicio }}"
                        style="display: none;">
                    @error('start_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="end_date" class="form-label" style="display: none;">Fecha Fin:</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $fechaFin }}"
                        style="display: none;">
                    @error('end_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="customer_id" class="form-label">Cliente:</label>
                    <select name="customer_id" id="customer_id"
                        class="form-control{{--  chosen-select --}} custom-select-height">
                        <option value="">Seleccione</option>
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
                    @if ($domosDisponibles->count() > 0)
                        <select name="domes[]" id="domes" class="form-control{{--  chosen-select --}}" multiple>
                            @foreach ($domosDisponibles as $domo)
                                <option value="{{ $domo->id }}">{{ $domo->name }}</option>
                            @endforeach
                        </select>
                    @else
                        <p> No hay Domos disponibles en estas fechas</p>
                    @endif
                    @error('domes')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="plans" class="form-label">Planes:</label>
                    @if ($planesDisponibles->count() > 0)
                        <select name="plans[]" id="plans" class="form-control{{--  chosen-select --}}" multiple>
                            @foreach ($planesDisponibles as $plane)
                                <option value="{{ $plane->id }}">{{ $plane->name }}</option>
                            @endforeach
                        </select>
                    @else
                        <p> No hay Planes disponibles en estas fechas</p>
                    @endif
                    @error('plans')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="services" class="form-label">Servicios:</label>
                    <select name="services[]" id="services" class="form-control{{--  chosen-select --}}" multiple>
                        @foreach ($servicios as $servicio)
                            <option value="{{ $servicio->id }}">{{ $servicio->name }}</option>
                        @endforeach
                    </select>
                    @error('services')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div id="quantity-inputs">
                    <!-- Los campos de cantidad se agregarán aquí -->
                </div>

                <div class="mb-2">
                    <label for="discount" class="form-label">Descuento(%):</label>
                    <input type="number" name="discount" id="discount" class="form-control" step="0.01"
                        value="{{ old('discount'), '0' }}">
                    @error('discount')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="tax" class="form-label">Impuesto(%):</label>
                    <input type="number" name="tax" id="tax" class="form-control" step="0.01"
                        value="{{ old('tax'), '19' }}">
                    @error('tax')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Enviar formulario</button>
            </form>
        @endif
    </div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet" /> --}}

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <style>
        .custom-select-height {
            height: 38px;
            /* Ajusta la altura según tus necesidades */
        }
    </style>

    {{-- <style>
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
    </style> --}}
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>

    <!-- Agrega el script de jQuery -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
    </script> --}}



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inicializa select2
            $('#services').select2({
                // Personaliza el mensaje cuando no se encuentran resultados
                language: {
                    noResults: function() {
                        return 'No se encontraron resultados';
                    }
                },
                placeholder: 'Selecciona uno o más servicios'
            });
            $('#plans').select2({
                // Personaliza el mensaje cuando no se encuentran resultados
                language: {
                    noResults: function() {
                        return 'No se encontraron resultados';
                    }
                },
                placeholder: 'Selecciona uno o más planes'
            });
            $('#domes').select2({
                // Personaliza el mensaje cuando no se encuentran resultados
                language: {
                    noResults: function() {
                        return 'No se encontraron resultados';
                    }
                },
                placeholder: 'Selecciona uno o más domos'
            });
            $('#customer_id').select2({
                // Personaliza el mensaje cuando no se encuentran resultados
                language: {
                    noResults: function() {
                        return 'No se encontraron resultados';
                    }
                },
                placeholder: 'Selecciona el cliente'
            });


            // Escucha cambios en la selección
            $('#services').on('change', function() {
                const selectedServices = $(this).val();

                // Limpiar campos de cantidad existentes
                $('#quantity-inputs').empty();

                // Agregar campos de cantidad para servicios seleccionados
                if (selectedServices) {
                    selectedServices.forEach(serviceId => {
                        // Crea un div para contener el label y el input
                        const containerDiv = document.createElement('div');

                        // Crea un label
                        const label = document.createElement('label');
                        label.textContent =
                            `${$('#services option[value="' + serviceId + '"]').text()}:`;
                        label.style.marginRight = '10px'; // Ajusta el margen derecho

                        // Crea un campo de cantidad
                        const quantityInput = document.createElement('input');
                        quantityInput.type = 'number';
                        quantityInput.name = `services_q[${serviceId}]`;
                        quantityInput.placeholder = 'Cantidad';
                        quantityInput.min = 1; // Establece el mínimo en 1

                        // Agrega el label y el campo de cantidad al contenedor
                        $('#quantity-inputs').append(label);
                        $('#quantity-inputs').append(quantityInput);

                        // Agrega el contenedor al contenedor principal
                        $('#quantity-inputs').append(containerDiv);
                    });
                }
            });
        });
    </script>

@stop
