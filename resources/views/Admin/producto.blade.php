@extends('adminlte::page')


@section('title', 'Admin')
<head>
    <style>
#imagen{
    max-width: 40%;
    max-height: 40%;
    text-align: center;
}
    </style>
</head>
@section('content_header')
<h1>Productos</h1>
@stop

@section('content')

@if(session('Info'))
<div class="alert alert-success">
    <strong>{{(session('Info'))}}</strong>
</div>
@endif




<div class="card">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Stock</th>
      <th scope="col">Img</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  @foreach($producto as $producto)
  <tbody>
    <tr>
      <th scope="row text-center">{{($producto->id)}}</th>
      <td scope="row text-center">{{($producto->nombre)}}</td>
      <td scope="row text-center">{{($producto->descripcion)}}</td>
      <td scope="row text-center">{{($producto->cantidad)}}</td>
      <td scope="row text-center"><img src="{{asset('uploads/productos/'.$producto->foto)}}" alt="foto" width="40px" height="40px"></td>
      <td><a href="{{route('admin.productoeditar',$producto)}}"><button class="btn btn-success btn-sm my-2">editar</button></a> <form action="{{route('admin.productodelete',$producto)}}" method="POST" class=".formulario-eliminar">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm my-2">Eliminar</button>
            </form></td>
    </tr>
  </tbody>
  @endforeach
</table>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop