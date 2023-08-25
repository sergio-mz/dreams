@extends('layouts.plantilla')

@section('title', 'Servicio ' . $servicio->name)

@section('content')
<h1>Bienvenidos al servicio:  {{$servicio->name}} </h1>
<a href="{{route('servicios.index')}}">Volver a servicios</a>
<br>
<a href="{{route('servicios.edit',$servicio)}}">Editar servicio</a>
<p><strong>Servicio: </strong>{{$servicio->name}}</p>
<p><strong>Estado: </strong>{{$servicio->status}}</p>
<p><strong>Precio: </strong>{{$servicio->price}}</p>
<p>{{$servicio->description}}</p>
<br>

<form action="{{route('servicios.destroy',$servicio)}}" method="POST">
    @csrf
    @method('delete')
    <button type="submit">Eliminar</button>
</form>

@endsection
