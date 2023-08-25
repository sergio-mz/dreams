@extends('layouts.plantilla')

@section('title', 'Clientes')

@section('content')
    <h1>Bienvenidos a la pagina clientes</h1>
    <a href="{{route('clientes.create')}}">Crear cliente</a>
    <ul>
        @foreach ($clientes as $cliente)
            <li>
                <a href="{{route('clientes.show',$cliente)}}">{{ $cliente->name }}</a> {{-- la ruta toma automaticamente la primera variable (id) de el objeto $cliente --}}
            </li>
        @endforeach
    </ul>

    {{ $clientes->links() }}
@endsection