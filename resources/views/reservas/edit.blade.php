@extends('adminlte::page')

@section('title', 'Reservas')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="container">
        <h1 class="mb-4">Editar Reserva</h1>
        <a href="{{ route('reservas.index') }}" class="btn btn-secondary mb-2">Volver a Reservas</a>
        <form action="{{ route('reservas.update', $reserva) }}" method="POST">
            @csrf {{-- Agrega un input oculto con un token para temas de seguridad --}}
            @method('put') {{-- Como HTML no entiende el método "put", aquí lo especifico --}}

            <div class="card mb-1 p-2 pl-4">
                <h5 class="card-title"><strong>Id de la reserva</strong></h5>
                <p class="card-text">{{ $reserva->id }}</p>
            </div>

            <div class="card mb-1 p-2 pl-4">
                <h5 class="card-title"><strong>Cliente</strong></h5>
                <p class="card-text">{{ $reserva->customer_id }}</p>
            </div>

            <div class="card mb-1 p-2 pl-4">
                <h5 class="card-title"><strong>Fecha Inicio</strong></h5>
                <p class="card-text">{{ $reserva->start_date }}</p>
            </div>

            <div class="card mb-1 p-2 pl-4">
                <h5 class="card-title"><strong>Fecha Fin</strong></h5>
                <p class="card-text">{{ $reserva->end_date }}</p>
            </div>

            <div class="mb-2">
                <label for="domes" class="form-label">Domos:</label>
                <select name="domes[]" id="domes" class="form-control" multiple>
                    @foreach ($reserva->domes as $domo)
                        <option value="{{ $domo->id }}" selected>{{ $domo->name }}</option>
                    @endforeach
                    @if ($domosDisponibles->count() > 0)
                        @foreach ($domosDisponibles as $domo)
                            <option value="{{ $domo->id }}">{{ $domo->name }}</option>
                        @endforeach
                    @else
                        <option value="" disabled> No hay otros domos disponibles en estas fechas</option>
                    @endif
                </select>
            </div>

            <div class="mb-2">
                <label for="plans" class="form-label">Planes:</label>
                <select name="plans[]" id="plans" class="form-control" multiple>
                    @foreach ($reserva->plans as $plane)
                        <option value="{{ $plane->id }}" selected data-dome-id="{{ $plane->dome_id }}">{{ $plane->name }}</option>
                    @endforeach
                    @if ($planesDisponibles->count() > 0)
                        @foreach ($planesDisponibles as $plane)
                            <option value="{{ $plane->id }}" data-dome-id="{{ $plane->dome_id }}">{{ $plane->name }}</option>
                        @endforeach
                    @else
                        <option value="" disabled> No hay otros planes disponibles en estas fechas</option>
                    @endif
                </select>
            </div>

            <div class="mb-2">
                <label for="services" class="form-label">Servicios:</label>
                <select name="services[]" id="services" class="form-control{{--  chosen-select --}}" multiple>
                    @foreach ($servicios as $servicio)
                        <option value="{{ $servicio->id }}"
                            {{ $reserva->services->contains($servicio->id) ? 'selected' : '' }}>{{ $servicio->name }}
                        </option>
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
                <input type="number" name="discount" id="discount" class="form-control"
                    value="{{ old('discount', $reserva->discount) }}" min="0">
                @error('discount')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-2">
                <label for="tax" class="form-label">Impuesto(%):</label>
                <input type="number" name="tax" id="tax" class="form-control" value="19" min="0">
                @error('tax')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
        </form>
    </div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>

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

                        // Convertir la variable de PHP a JavaScript
                        var reservaId = @json($reserva->id);

                        // Obtener el token CSRF del elemento meta en el HTML
                        var csrfToken = $('meta[name="csrf-token"]').attr('content');

                        // Hacer una solicitud AJAX al servidor
                        $.ajax({
                            url: '{{ route('reservas.cantidadServicio') }}', // Reemplaza con la URL adecuada
                            method: 'POST', // Puedes usar POST u otro método HTTP según tu configuración
                            headers: {
                                'X-CSRF-TOKEN': csrfToken // Agrega el token CSRF como encabezado
                            },
                            data: {
                                serviceId: serviceId,
                                reservaId: reservaId
                            },
                            success: function(response) {
                                var cantidadServicio = response.cantidad;
                                quantityInput.value = cantidadServicio || 1;
                            },
                            error: function(xhr, status, error) {
                                // Maneja los errores si es necesario
                            }
                        });

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

    <script>
        // Obtener los elementos de los campos de Domos y Planes
        const domesSelect = document.getElementById('domes');
        const plansSelect = document.getElementById('plans');

        // Obtener todas las opciones de planes y domos
        const allPlanOptions = plansSelect.querySelectorAll('option');
        const allDomeOptions = domesSelect.querySelectorAll('option');

        // Escuchar cambios en el selector de Domos
        $('#domes').on('change', function() {
            console.log('Evento "change" detectado en el selector de Domos');
            // Obtener los valores seleccionados en el selector de Domos
            const selectedDomes = Array.from(domesSelect.selectedOptions).map(option => option.value);

            // Filtrar las opciones de planes basadas en los domos seleccionados
            allPlanOptions.forEach(option => {
                // Obtener el atributo "data-dome-id" que almacena el ID del domo asociado al plan
                const domeId = option.getAttribute('data-dome-id');

                // Mostrar la opción solo si no tiene un domo asignado en los seleccionados
                option.disabled = selectedDomes.includes(domeId);
            });
        });

        // Escuchar cambios en el selector de Planes
        $('#plans').on('change', function() {
            console.log('Evento "change" detectado en el selector de Planes');
            // Obtener los valores seleccionados en el selector de Planes
            const selectedPlans = Array.from(plansSelect.selectedOptions).map(option => option.getAttribute(
                'data-dome-id'));

            // Filtrar las opciones de domos basadas en los Planes seleccionados
            allDomeOptions.forEach(option => {
                // Obtener el ID del domo seleccionado
                const domeId = option.value;

                // Mostrar la opción solo si no está asociada a ningún Plan seleccionado
                option.disabled = selectedPlans.includes(domeId);
            });
        });
    </script>
@stop
