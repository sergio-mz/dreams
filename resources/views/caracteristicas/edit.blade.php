@extends('layouts.plantilla')

@section('title', 'Caracteristicas edit')

@section('content')
    <h1>En esta pagina podras editar una caracteristica</h1>
    <form action="{{route('caracteristicas.update',$caracteristica)}}" method="POST">

        @csrf {{-- agrega un input oculto con un token para temas de seguridad --}}
        @method('put') {{-- como html no entiende el put, aqui lo especifico --}}

        <label>
            Nombre:
            <br>
            <input type="text" name="name" value="{{old('name',$caracteristica->name)}}">
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
                <option value="1" {{ $caracteristica->status === 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ $caracteristica->status === 0 ? 'selected' : '' }}>Inactivo</option>
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
            <textarea name="description" rows="5">{{old('description',$caracteristica->description)}}</textarea>
        </label>

        @error('description') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Precio:
            <br>
            <input type="text" name="price" value="{{old('price',$caracteristica->price)}}">
        </label>

        @error('price') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <button type="submit">Actualizar caracteristica</button>
    </form>
@endsection