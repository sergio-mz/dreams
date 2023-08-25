@extends('layouts.plantilla')

@section('title', 'Planes edit')

@section('content')
    <h1>En esta pagina podras editar una plane</h1>
    <form action="{{route('planes.update',$plane)}}" method="POST">

        @csrf {{-- agrega un input oculto con un token para temas de seguridad --}}
        @method('put') {{-- como html no entiende el put, aqui lo especifico --}}

        <label>
            Nombre:
            <br>
            <input type="text" name="name" value="{{old('name',$plane->name)}}">
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
            <input type="text" name="price" value="{{old('price',$plane->price)}}">
        </label>

        @error('price') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <div class="form-group">
            <label>Domo:</label>
            <div>
                @foreach($domos as $domo)
                    <label>
                        <input type="radio" name="domo" value="{{ $domo->id }}"
                            {{ $plane->domes->contains($domo->id) ? 'checked' : '' }}>
                        {{ $domo->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <br>
        <label>
            Estado:
            <br>
            <select name="status">
                <option value="1" {{ $plane->status === 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ $plane->status === 0 ? 'selected' : '' }}>Inactivo</option>
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
            <textarea name="description" rows="5">{{old('description',$plane->description)}}</textarea>
        </label>

        @error('description') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <button type="submit">Actualizar plan</button>
    </form>
@endsection