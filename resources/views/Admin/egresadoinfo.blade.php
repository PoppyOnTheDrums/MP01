@extends('adminlte::page')


@section('title', 'Admin')

@section('content_header')
    <h1>Egresado</h1>
@stop

@section('content')

<h3>Aqui debe aparacer toda la informacion del egresado seleccionado :D</h3>

<div class="container">
<label for="">Nombre</label>
<p>{{$egresado->nombre}}</p>
<label for="">Apellido</label>
<p>{{$egresado->apellido}}</p>
<label for="">Institucion Educativa</label>
<p>{{$egresado->institucion_educativa}}</p>
<label for="">Fecha de nacimiento</label>
<p>{{$egresado->fecha_nac}}</p>
<label for="">Sexo</label>
<p>{{$egresado->sexo}}</p>
<label for="">Email</label>
<p>{{$egresado->email}}</p>


</div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop