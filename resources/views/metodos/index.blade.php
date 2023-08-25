@extends('layouts.plantilla')

@section('title', 'Metodos')

@section('content')
    <h1>Bienvenidos a la pagina metodos</h1>
    <a href="{{route('metodos.create')}}">Crear metodo de pago</a>
    <ul>
        @foreach ($metodos as $metodo)
            <li>
                <a href="{{route('metodos.show',$metodo)}}">{{ $metodo->name }}</a> {{-- la ruta toma automaticamente la primera variable (id) de el objeto $metodo --}}
            </li>
        @endforeach
    </ul>

    {{ $metodos->links() }}
@endsection