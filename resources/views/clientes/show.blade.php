@extends('layouts.plantilla')

@section('title', 'Cliente ' . $cliente->id)

@section('content')
<h1>Bienvenidos al cliente:  {{$cliente->name}} </h1>
<a href="{{route('clientes.index')}}">Volver a clientes</a>
<br>
<a href="{{route('clientes.edit',$cliente)}}">Editar cliente</a>
<p><strong>Cedula: </strong>{{$cliente->document}}</p>
<p><strong>Nombre: </strong>{{$cliente->name}}</p>
<p><strong>Apellido: </strong>{{$cliente->last_name}}</p>
<p><strong>Correo: </strong>{{$cliente->email}}</p>
<p><strong>Celular: </strong>{{$cliente->cellphone}}</p>
<p><strong>Fecha de Nacimiento: </strong>{{$cliente->birthdate}}</p>
<p><strong>Ciudad: </strong>{{$cliente->city}}</p>
<p><strong>Dirección: </strong>{{$cliente->address}}</p>
<br>

<form action="{{route('clientes.destroy',$cliente)}}" method="POST">
    @csrf
    @method('delete')
    <button type="submit">Eliminar</button>
</form>

@endsection
