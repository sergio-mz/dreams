@extends('layouts.plantilla')

@section('title', 'Domos edit')

@section('content')
    <h1>En esta pagina podras editar una domo</h1>
    <form action="{{route('domos.update',$domo)}}" method="POST">

        @csrf {{-- agrega un input oculto con un token para temas de seguridad --}}
        @method('put') {{-- como html no entiende el put, aqui lo especifico --}}

        <label>
            Nombre:
            <br>
            <input type="text" name="name" value="{{old('name',$domo->name)}}">
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
                <option value="1" {{ $domo->status === 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ $domo->status === 0 ? 'selected' : '' }}>Inactivo</option>
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
            <input type="text" name="price" value="{{old('price',$domo->price)}}">
        </label>

        @error('price') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <label>
            ubicacion:
            <br>
            <textarea name="location" rows="5">{{old('location',$domo->location)}}</textarea>
        </label>

        @error('location') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror


        <br>
        <label>
            Descripcion:
            <br>
            <textarea name="description" rows="5">{{old('description',$domo->description)}}</textarea>
        </label>

        @error('description') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
       
        <br>
        <label>
            capacidad:
            <br>
            <input type="text" name="capacity" value="{{old('capacity',$domo->capacity)}}">
        </label>

        @error('capacity') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <div class="form-group">
            <label>Caracteristicas:</label>
            <div>
                @foreach($caracteristicas as $caracteristica)
                    <label>
                        <input type="checkbox" name="caracteristicas[]" value="{{ $caracteristica->id }}"
                            {{ $domo->characteristics->contains($caracteristica->id) ? 'checked' : '' }}>
                        {{ $caracteristica->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <br>
        <button type="submit">Actualizar domo</button>
    </form>
@endsection