@extends('adminlte::page')


@section('title', 'Admin')

@section('content_header')
<h1>Empresa</h1>
@stop

@section('content')
<h3>Aqui debe aparacer toda la informacion de la vacante seleccionada :D</h3>

<div class="container">
    <label for="">Nombre</label>
    <p>{{$vacante->nombre}}</p>

    <form action="{{route('admin.vacanteupdate',$vacante)}}" method="POST" autocomplete="off">
        @csrf
        @method('PUT')

        <div>
            <select name="estado">
                <option value="{{$vacante->estado}}">{{$vacante->estado}}</option>
                <option value="abierta">Abierta</option>
                <option value="cerrada">Cerrada</option>
            </select>
        </div>
        <div>
            <label for="">Egresado</label>
            <input type="text" name="user_id" value="{{$vacante->user_id}}">
        </div>
        <button type="submit">Actualizar</button>
    </form>
</div>

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