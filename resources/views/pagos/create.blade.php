@extends('adminlte::page')

@section('title', 'Pagos')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="container">
        <h1 class="mb-4">Crear Nuevo Pago</h1>
        <a href="{{ route('pagos.index') }}" class="btn btn-secondary mb-2">Volver a Pagos</a>


        <form action="{{ route('pagos.create') }}" method="POST">
            @csrf

            <div class="mb-2">
                <label for="booking_id" class="form-label">Número de Reserva:</label>
                <select name="booking_id" id="booking" class="form-control">
                    <option value="">Seleccione</option>
                    @foreach ($reservas as $reserva)
                        <option value="{{ $reserva->id }}"
                            {{ isset($esta_reserva) ? ($esta_reserva == $reserva ? 'selected' : '') : '' }}>
                            {{ $reserva->id }}
                        </option>
                    @endforeach
                </select>
                @error('booking_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Verificar Información</button>
        </form>

        @if (isset($abonos))
            <form action="{{ route('pagos.store') }}" method="POST">
                @csrf

                <div class="mb-2">
                    <label for="booking_id" class="form-label">Número de Reserva:</label>
                    <input type="number" name="booking_id" id="booking_id" class="form-control" value="{{ $esta_reserva->id }}"
                        style="display: none;">
                    @error('booking_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="card mb-1 p-2 pl-4">
                    <h5 class="card-title"><strong>Valor Total</strong></h5>
                    <p class="card-text">$ {{ number_format($esta_reserva->total, 0, ',', '.') }}</p>
                </div>

                <div class="card mb-1 p-2 pl-4">
                    <h5 class="card-title"><strong>Pagos Realizados</strong></h5>
                    <p class="card-text">$ {{ number_format($abonos, 0, ',', '.') }}</p>
                </div>

                <div class="card mb-1 p-2 pl-4">
                    <h5 class="card-title"><strong>Saldo</strong></h5>
                    <p class="card-text">$ {{ number_format($saldo, 0, ',', '.') }}</p>
                </div>

                <input type="number" name="saldo" value="{{ $saldo }}" style="display: none;">

                <div class="mb-2">
                    <label for="pay_method_id" class="form-label">Método de Pago:</label>
                    <select name="pay_method_id" id="pay_method_id" class="form-control">
                        @foreach ($metodos as $metodo)
                            <option value="{{ $metodo->id }}">
                                {{ $metodo->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('pay_method_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="form-label">Valor a Pagar:</label>
                    <div>
                        <label class="role-label">
                            <input type="radio" name="total" value="{{ $saldo }}" checked>
                            Pago Total: $ {{ $saldo }}
                        </label> <br>
                        <label class="role-label">
                            <input type="radio" name="total" value="partial">
                            Pago Parcial
                        </label>
                    </div>
                </div>

                <div class="mb-2">
                    <!-- Campo de entrada para Pago Parcial (inicialmente oculto) -->
                    <div id="partial-payment-field">
                        <label for="partial">Monto del Pago Parcial:</label>
                        <input type="number" name="partial" id="partial" class="form-control" value="0" min="0"
                            max="{{ $saldo }}">
                    </div>
                    @error('partial')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Enviar formulario</button>
            </form>
        @endif
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

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
            $('#booking').select2({
                // Personaliza el mensaje cuando no se encuentran resultados
                language: {
                    noResults: function() {
                        return 'No se encontraron resultados';
                    }
                },
                placeholder: 'Selecciona el número de reserva'
            });

            /* ***Pagos Parciales*** */
            // Ocultar el campo de entrada al cargar la página
            $('#partial-payment-field').hide();

            // Escuchar cambios en la selección del radio button
            $('input[type=radio][name=total]').change(function() {
                if (this.value === 'partial') {
                    // Mostrar el campo de entrada cuando se selecciona "Pago Parcial"
                    $('#partial-payment-field').show();
                } else {
                    // Ocultar el campo de entrada cuando se selecciona "Pago Total"
                    $('#partial-payment-field').hide();
                }
            });
        });
    </script>

@stop
