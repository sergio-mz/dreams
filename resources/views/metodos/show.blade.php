@extends('layouts.plantilla')

@section('title', 'Metodo ' . $metodo->name)

@section('content')
<h1>Bienvenidos al metodo de pago:  {{$metodo->name}} </h1>
<a href="{{route('metodos.index')}}">Volver a metodos</a>
<br>
<a href="{{route('metodos.edit',$metodo)}}">Editar metodo de pago</a>
<p><strong>Metodo de pago: </strong>{{$metodo->name}}</p>
<br>

<form action="{{route('metodos.destroy',$metodo)}}" method="POST">
    @csrf
    @method('delete')
    <button type="submit">Eliminar</button>
</form>

@endsection
