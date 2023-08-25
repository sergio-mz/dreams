@extends('layouts.plantilla')

@section('title', 'Plan ' . $plane->id)

@section('content')
<h1>Bienvenidos al plan:  {{$plane->name}} </h1>

<a href="{{route('planes.index')}}">Volver a planes</a>
<br>

<a href="{{route('planes.edit',$plane)}}">Editar plan</a>

<p><strong>Nombre: </strong>{{$plane->name}}</p>
<p><strong>Precio: </strong>{{$plane->price}}</p>
<p><strong>Domo:</strong>
    @foreach($plane->domes as $dome)
        {{ $dome->name }}
    @endforeach
</p>
<p><strong>Estado: </strong>{{$plane->status}}</p>
<p><strong>Descripcion: </strong>{{$plane->description}}</p>
<br>

<form action="{{route('planes.destroy',$plane)}}" method="POST">
    @csrf
    @method('delete')
    <button type="submit">Eliminar</button>
</form>

@endsection
