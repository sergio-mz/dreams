@extends('layouts.plantilla')

@section('title', 'Servicios edit')

@section('content')
    <h1>En esta pagina podras editar un servicio</h1>
    <form action="{{route('servicios.update',$servicio)}}" method="POST">

        @csrf {{-- agrega un input oculto con un token para temas de seguridad --}}
        @method('put') {{-- como html no entiende el put, aqui lo especifico --}}

        <label>
            Servicio:
            <br>
            <input type="text" name="name" value="{{old('name',$servicio->name)}}">
        </label>

        @error('name') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Estado:
            <br>
            <select name="status">
                <option value="1" {{ $servicio->status === 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ $servicio->status === 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
        </label>

        @error('status') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Precio:
            <br>
            <input type="text" name="price" value="{{old('price',$servicio->price)}}">
        </label>

        @error('price') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Descripcion:
            <br>
            <textarea name="description" rows="5">{{old('description',$servicio->description)}}</textarea>
        </label>

        @error('description') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <button type="submit">Actualizar servicio</button>
    </form>
@endsection