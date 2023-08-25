@extends('layouts.plantilla')

@section('title', 'Metodos edit')

@section('content')
    <h1>En esta pagina podras editar una metodo</h1>
    <form action="{{route('metodos.update',$metodo)}}" method="POST">

        @csrf {{-- agrega un input oculto con un token para temas de seguridad --}}
        @method('put') {{-- como html no entiende el put, aqui lo especifico --}}

        <label>
            Metodo de pago:
            <br>
            <input type="text" name="name" value="{{old('name',$metodo->name)}}">
        </label>

        @error('name') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <button type="submit">Actualizar metodo de pago</button>
    </form>
@endsection