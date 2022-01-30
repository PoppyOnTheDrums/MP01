@extends('adminlte::page')


@section('title', 'Admin')

@section('content_header')
<h1>Empresa</h1>
@stop

@section('content')
<h3>Aqui debe aparacer toda la informacion la empresa seleccionada seleccionado :D</h3>

<div class="container">
    <label for="">Nombre</label>
    <p>{{$empresa->nombre}}</p>
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