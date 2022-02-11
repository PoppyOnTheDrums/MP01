@extends('adminlte::page')


@section('title', 'Admin')

@section('content_header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<h1>Informacion de Empresa</h1>
@stop

@section('content')

<div class="card">
    <div class="container">
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Nombre:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$empresa->nombre}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">RNC:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$empresa->rnc}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Visibilidad:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$empresa->visibilidad}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Departamento de formacion:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$empresa->dp_formacion}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Alcance:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$empresa->alcance}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Actividad economica:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$empresa->actividad_economica}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Industria:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$empresa->industria}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Tamaño:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$empresa->tamano}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Direccion:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$empresa->direccion}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Sector:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$empresa->sector}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Seccion:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$empresa->seccion}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Municipio:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$empresa->municipio}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Provincia:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$empresa->provincia}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Telefono Principal:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$empresa->telefono_principal}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-4 pl-2">Telefono Directo:</h5>
            <p class="h5 pt-4 pl-4 pb-4 font-weight-normal">{{$empresa->telefono_directo}}</p>
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