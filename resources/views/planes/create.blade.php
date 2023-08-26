@extends('layouts.plantilla')

@section('title', 'Planes Create')

@section('content')
    <h1>En esta pagina podras crear un plan</h1>
    <form action="{{route('planes.store')}}" method="POST">

        @csrf {{-- agrega un input oculto con un token para temas de seguridad --}}

        <label>
            Nombre:
            <br>
            <input type="text" name="name" value="{{old('name')}}">
        </label>

        @error('name') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Precio:
            <br>
            <input type="number" name="price" step="0.01" value="{{old('price')}}">
        </label>

        @error('price') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Estado:
            <br>
            <select name="status">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </label>

        @error('status') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Descripcion:
            <br>
            <textarea name="description" rows="5">{{old('description')}}</textarea>
        </label>

        @error('description') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <button type="submit">Enviar formulario</button>
    </form>
@endsection