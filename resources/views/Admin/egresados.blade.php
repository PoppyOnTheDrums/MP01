@extends('adminlte::page')


@section('title', 'Admin')

@section('content_header')
<h1>Egresados</h1>
@stop

@section('content')

<div class="container">
    <form action="{{route('admin.egresado')}}" method="get">
        <input type="search" name="query" placeholder="Buscar...">
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Institucion Educativa</th>
                <th>Carrera Tecnica</th>
                <th>Fecha de nacimiento</th>
                <th>Provincia</th>
                <th width="150px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($data) && $data->count())
            @foreach($data as $key => $egresado)
            <tr>
                <td>{{ $egresado->user_id }}</td>
                <td>{{ $egresado->nombre }}</td>
                <td>{{ $egresado->institucion_educativa }}</td>
                <td>{{ $egresado->carrera_tecnica }}</td>
                <td>{{ $egresado->fecha_nac }}</td>
                <td>{{ $egresado->provincia }}</td>
                <td>
                    <a href="{{route('admin.egresadoinfo', $egresado)}}">Ver Egresado</a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="10">No se encontraron Egresados</td>
            </tr>
            @endif
        </tbody>
    </table>

    {!! $data->links() !!}
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