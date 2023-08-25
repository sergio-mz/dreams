@extends('layouts.plantilla')

@section('title', 'Planes')

@section('content')
    <h1>Bienvenidos a la pagina planes</h1>
    <a href="{{route('planes.create')}}">Crear plan</a>
    <ul>
        @foreach ($planes as $plane)
            <li>
                <a href="{{route('planes.show',$plane)}}">{{ $plane->name }}</a> {{-- la ruta toma automaticamente la primera variable (id) de el objeto $caracteristica --}}
            </li>
        @endforeach
    </ul>

    {{ $planes->links() }}
@endsection