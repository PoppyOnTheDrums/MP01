@extends('adminlte::page')


@section('title', 'Admin')

@section('content_header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@stop

@section('content')

@if(session()->has('message'))
<script>
    alert("La informacion se a actualizado correctamente!");
</script>
@elseif(session()->has('message2'))
<script>
    alert("El egresado al cual le asigno la vacante no existe!");
</script>
@endif


<div class="card">

    <div class="container">

        <div class="d-flex">
            <h5 class="pt-4 pl-2">Empresa:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$vacante->nombre}}</p>
        </div>

        <div class="d-flex">
            <h5 class="pt-4 pl-2">Puesto:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$vacante->puesto}}</p>
        </div>
        <div class="d-flex container">
            <h5 class="pt-2 ">Perfil del Puesto:</h5>
            <p class="h5 pt-4 pl-4 font-weight-normal">{{$vacante->perfi_puesto}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-2 pl-2">Sueldo:</h5>
            <p class="h5 pt-2 pl-4 font-weight-normal">{{$vacante->sueldo}} $</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-2 pl-2">Ubicacion:</h5>
            <p class="h5 pt-2 pl-4 font-weight-normal">{{$vacante->ubicacion}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-2 pl-2">Tipo de contrato:</h5>
            <p class="h5 pt-2 pl-4 font-weight-normal">{{$vacante->tipo_contrato}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-2 pl-2">Horario:</h5>
            <p class="h5 pt-2 pl-4 font-weight-normal">{{$vacante->horario}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-2 pl-2">Correo | curriculum:</h5>
            <p class="h5 pt-2 pl-4 font-weight-normal">{{$vacante->correo_curriculum}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-2 pl-2">Persona de Contacto:</h5>
            <p class="h5 pt-2 pl-4 font-weight-normal">{{$vacante->persona_contacto}}</p>
        </div>
        <div class="d-flex">
            <h5 class="pt-2 pl-2">Telefono:</h5>
            <p class="h5 pt-2 pl-4 font-weight-normal">{{$vacante->telefono}}</p>
        </div>

        <form action="{{route('admin.vacanteupdate',$vacante)}}" method="POST" autocomplete="off">
            @csrf
            @method('PUT')

            <div class="d-flex py-2">
                <h5 class="pt-2 pl-2">Estado:</h5>
                <div class="col-sm">
                    <select name="estado" class="form-select">
                        <option value="abierta">Abierta</option>
                        <option value="cerrada">Cerrada</option>
                    </select>
                </div>
                <div class="col-sm">
                    <p class="h6 pt-2">Estado Actual: {{$vacante->estado}}</p>

                </div>
            </div>
            <div class="d-flex py-2">
                <p class="h5 ml-2 pr-4">Egresado:</p>
                <input class="mb-2" type="number" name="user_id" value="{{$vacante->user_id}}">
            </div>
            <button type="submit" class="mb-4 btn btn-primary ml-2">Actualizar</button>
        </form>
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