@extends('layouts.plantilla')

@section('title', 'Caracteristica ' . $caracteristica->id)

@section('content')
<h1>Bienvenidos a la caracteristica:  {{$caracteristica->name}} </h1>
<a href="{{route('caracteristicas.index')}}">Volver a caracteristicas</a>
<br>
<a href="{{route('caracteristicas.edit',$caracteristica)}}">Editar caracteristica</a>
<p><strong>Precio: </strong>{{$caracteristica->price}}</p>
<p><strong>Estado: </strong>{{$caracteristica->status}}</p>
<p>{{$caracteristica->description}}</p>
<br>

<form action="{{route('caracteristicas.destroy',$caracteristica)}}" method="POST">
    @csrf
    @method('delete')
    <button type="submit">Eliminar</button>
</form>

@endsection

