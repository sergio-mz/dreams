@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Página Principal</h1>
@stop

@section('content')

<div class="container">
    <h1>Selecciona las Fechas</h1>
    <form id="fecha-form">
        @csrf
        <div class="mb-3">
            <label for="start_date" class="form-label">Fecha de Inicio:</label>
            <input type="date" name="start_date" id="start_date" class="form-control">
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">Fecha de Fin:</label>
            <input type="date" name="end_date" id="end_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Buscar Domos Disponibles</button>
    </form>
</div>

<div class="container mt-4">
    <div id="domos-disponibles">

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#fecha-form').submit(function(e) {
            e.preventDefault();
            buscarDomosDisponibles();
        });

        function buscarDomosDisponibles() {
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();

            $.ajax({
                type: 'GET',
                url: '{{ route('buscar-domos-disponibles') }}',
                data: {
                    start_date: start_date,
                    end_date: end_date
                },
                success: function(response) {
                    $('#domos-disponibles').html(response);
                }
            });
        }
    });
</script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    
@stop