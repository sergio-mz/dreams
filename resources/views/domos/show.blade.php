@extends('layouts.plantilla')

@section('title', 'Domo ' . $domo->id)

@section('content')
<h1>Bienvenidos al domo:  {{$domo->name}} </h1>
<a href="{{route('domos.index')}}">Volver a domos</a>
<br>
<a href="{{route('domos.edit',$domo)}}">Editar domo</a>
<p><strong>Nombre: </strong>{{$domo->name}}</p>
<p><strong>Estado: </strong>{{$domo->status}}</p>
<p><strong>Precio: </strong>{{$domo->price}}</p>
<p><strong>ubicacion: </strong>{{$domo->location}}</p>
<p><strong>Descripcion: </strong>{{$domo->description}}</p>
<p><strong>capacidad: </strong>{{$domo->capacity}}</p>
<p><strong>Caracteristicas:</strong></p>
    <ul>
        @foreach($domo->characteristics as $characteristic)
            <li>{{ $characteristic->name }}</li>
        @endforeach
    </ul>
<br>

<form action="{{route('domos.destroy',$domo)}}" method="POST">
    @csrf
    @method('delete')
    <button type="submit">Eliminar</button>
</form>

@endsection
