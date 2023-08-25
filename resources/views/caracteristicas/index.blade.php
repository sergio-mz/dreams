@extends('layouts.plantilla')

@section('title', 'Caracteristicas')

@section('content')
    <h1>Bienvenidos a la pagina caracteristicas</h1>
    <a href="{{route('caracteristicas.create')}}">Crear caracteristica</a>
    <ul>
        @foreach ($caracteristicas as $caracteristica)
            <li>
                <a href="{{route('caracteristicas.show',$caracteristica)}}">{{ $caracteristica->name }}</a> {{-- la ruta toma automaticamente la primera variable (id) de el objeto $caracteristica --}}
            </li>
        @endforeach
    </ul>

    {{ $caracteristicas->links() }}
@endsection