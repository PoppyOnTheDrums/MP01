@extends('adminlte::page')


@section('title', 'Admin')

@section('content_header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<h1>Informacion de Egresado</h1>
@stop

@section('content')

<div class="card">
    <div class="container">
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Graduacion:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$egresado->graduacion}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Institucion Educativa:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$egresado->institucion_educativa}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Curso:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$egresado->curso}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Matricula:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$egresado->matricula}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Cedula:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$egresado->cedula}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Carrera Tecnica:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$egresado->carrera_tecnica}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Tecnico Basico:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$egresado->tecnico_basico}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Nombre:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$egresado->nombre}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Apellido:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$egresado->apellido}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Fecha de Nacimiento:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$egresado->fecha_nac}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Sexo:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$egresado->sexo}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Direccion:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$egresado->direccion}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Sector:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$egresado->sector}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Seccion:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$egresado->seccion}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Municipio:</h5>
            <p class="h5 pt-4 pl-4 pb-4 font-weight-normal">{{$egresado->municipio}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Provincia:</h5>
            <p class="h5 pt-4 pl-4 pb-4 font-weight-normal">{{$egresado->provincia}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Pais:</h5>
            <p class="h5 pt-4 pl-4 pb-4 font-weight-normal">{{$egresado->pais_nacionalidad}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Telefono recidencial:</h5>
            <p class="h5 pt-4 pl-4 pb-4 font-weight-normal">{{$egresado->telefono_recidencial}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Telefono movil:</h5>
            <p class="h5 pt-4 pl-4 pb-4 font-weight-normal">{{$egresado->telefono_movil}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Licencia:</h5>
            <p class="h5 pt-4 pl-4 pb-4 font-weight-normal">{{$egresado->licencia}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Vehiculo:</h5>
            <p class="h5 pt-4 pl-4 pb-4 font-weight-normal">{{$egresado->vehiculo}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Email:</h5>
            <p class="h5 pt-4 pl-4 pb-4 font-weight-normal">{{$egresado->email}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Años de Experiencia:</h5>
            <p class="h5 pt-4 pl-4 pb-4 font-weight-normal">{{$egresado->experiencia}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Desea trabajar en su Area tecnica de trabajo:</h5>
            <p class="h5 pt-4 pl-4 pb-4 font-weight-normal">{{$egresado->area_tecnica_trabajo}}</p>
        </div>
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