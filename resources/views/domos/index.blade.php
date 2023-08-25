@extends('layouts.plantilla')

@section('title', 'Domos')

@section('content')
    <h1>Bienvenidos a la pagina domos</h1>
    <a href="{{route('domos.create')}}">Crear domo</a>
    <ul>
        @foreach ($domos as $domo)
            <li>
                <a href="{{route('domos.show',$domo)}}">{{ $domo->name }}</a> {{-- la ruta toma automaticamente la primera variable (id) de el objeto $caracteristica --}}
            </li>
        @endforeach
    </ul>

    {{ $domos->links() }}
@endsection