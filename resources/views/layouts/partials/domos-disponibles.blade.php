@if ($domosDisponibles->count() > 0)
    <h2>Domos Disponibles</h2>
    <ul>
        @foreach ($domosDisponibles as $domo)
            <li>{{ $domo->name }}</li>
        @endforeach
    </ul>
@else
    <p>No hay domos disponibles para las fechas seleccionadas.</p>
@endif