@extends('layouts.plantilla')

@section('title', 'Clientes edit')

@section('content')
    <h1>En esta pagina podras editar un cliente</h1>
    <form action="{{route('clientes.update',$cliente)}}" method="POST">

        @csrf {{-- agrega un input oculto con un token para temas de seguridad --}}
        @method('put') {{-- como html no entiende el put, aqui lo especifico --}}

        <label>
            Cedula:
            <br>
            <input type="text" name="document" value="{{old('document',$cliente->document)}}">
        </label>

        @error('document') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Nombre:
            <br>
            <input type="text" name="name" value="{{old('name',$cliente->name)}}">
        </label>

        @error('name') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Apellido:
            <br>
            <input type="text" name="last_name" value="{{old('last_name',$cliente->last_name)}}">
        </label>

        @error('last_name') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Correo:
            <br>
            <input type="email" name="email" value="{{old('email',$cliente->email)}}">
        </label>

        @error('email') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Celular:
            <br>
            <input type="text" name="cellphone" value="{{old('cellphone',$cliente->cellphone)}}">
        </label>

        @error('cellphone') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Fecha de nacimiento:
            <br>
            <input type="date" name="birthdate" value="{{old('birthdate',$cliente->birthdate)}}">
        </label>

        @error('birthdate') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Ciudad:
            <br>
            <input type="text" name="city" value="{{old('city',$cliente->city)}}">
        </label>

        @error('city') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Dirección:
            <br>
            <input type="text" name="address" value="{{old('address',$cliente->address)}}">
        </label>

        @error('address') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <button type="submit">Actualizar cliente</button>
    </form>
@endsection