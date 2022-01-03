@extends('adminlte::page')


@section('title', 'Admin')

@section('content_header')
<h1>Categorias</h1>
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
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        @foreach($categorias as $categorias)
        <tbody>
            <tr>
                <th scope="row text-center">{{($categorias->id)}}</th>
                <td scope="row text-center">{{($categorias->nombre)}}</td>
                <td scope="row text-center">{{($categorias->descripcion)}}</td>
                <td><a href="{{route('admin.categoriasedit',$categorias)}}"><button class="btn btn-success btn-sm my-2 mx-2">editar</button></a></td>
                <td>
                <form action="{{route('admin.categoriasdelete',$categorias)}}" method="POST" class=".formulario-eliminar">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm my-2">Eliminar</button>
                </form>
                </td>
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