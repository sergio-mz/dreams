@extends('layouts.plantilla')

@section('title', 'Metodos Create')

@section('content')
    <h1>En esta pagina podras seleccionar un metodo de pago</h1>
    <form action="{{route('metodos.store')}}" method="POST">

        @csrf {{-- agrega un input oculto con un token para temas de seguridad --}}

        <label>
            Metodo de pago:
            <br>
            <input type="text" name="name" value="{{old('name')}}">
        </label>

        @error('name') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <button type="submit">Enviar</button>
    </form>
@endsection
