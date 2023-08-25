@extends('layouts.plantilla')

@section('title', 'Servicios')

@section('content')
    <h1>Bienvenidos a la pagina servicios</h1>
    <a href="{{route('servicios.create')}}">Crear servicio</a>
    <ul>
        @foreach ($servicios as $servicio)
            <li>
                <a href="{{route('servicios.show',$servicio)}}">{{ $servicio->name }}</a> {{-- la ruta toma automaticamente la primera variable (id) de el objeto $servicio --}}
            </li>
        @endforeach
    </ul>

    {{ $servicios->links() }}
@endsection