@extends('adminlte::page')


@section('title', 'Admin')

@section('content_header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<h1>Asignar Egresado</h1>
@stop

@section('content')
@if(session()->has('message'))
<script>
    alert("El egresado se asigno correctamente!");
</script>
@elseif(session()->has('message2'))
<script>
    alert("El egresado que quiere asignar no existe!");
</script>
@elseif(session()->has('message3'))
<script>
    alert("El egresado se elimino correctamente!");
</script>
@elseif(session()->has('message4'))
<script>
    alert("El egresado se ya esta asignado en la vacante!");
</script>
@endif

    <div class="card py-4 pl-2" style="width: 34rem;">
        <form autocomplete="off" action="{{ route('admin.asignstore')}}" method="POST">
            @csrf
            <div class="d-flex">
            <h1 class="h6 pt-2 pr-2">ID del Egresado:</h1>
            <input type="number" name="user_id" class="mx-2">
            <input type="hidden" name="vacante_id" value="{{$vacante->id}}">
            <br>
            <button type="submit" class="btn btn-success ml-4 mr-2">Asignar Egresado</button>
            </div>
        </form>
    </div>
    <div>
        <table class="table table-bordered w-50">
            <tr>
                <th>ID de Usuarios Asignados</th>
                <th>Accion</th>
            </tr>
            @foreach($detalle_v as $detalle_v)
            <tr>

                <td class="h3">{{$detalle_v->user_id}}</td>
                <td>
                    <form action="{{route('admin.asigndelete',$detalle_v)}}" method="POST" class="">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm my-2">Eliminar</button>
                    </form>
                </td>

            </tr>
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