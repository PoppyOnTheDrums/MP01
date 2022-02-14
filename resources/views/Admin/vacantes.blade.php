@extends('adminlte::page')


@section('title', 'Admin')

@section('content_header')
<h1>Ventana de Vacantes</h1>
@stop

@section('content')
<div class="container">
    <form action="{{route('admin.vacante')}}" method="get">
        <input type="search" name="query" placeholder="Buscar...">
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Empresa</th>
                <th>Empresa</th>
                <th>Puesto</th>
                <th>Tipo de Contrato</th>
                <th>Estado</th>
                <th width="150px;">Action</th>
                <th width="150px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($data) && $data->count())
            @foreach($data as $key => $vacante)
            <tr>
                <td>{{ $vacante->empresa_id }}</td>
                <td>{{ $vacante->nombre }}</td>
                <td>{{ $vacante->puesto }}</td>
                <td>{{ $vacante->tipo_contrato }}</td>
                <td>{{ $vacante->estado }}</td>
                <td>
                    <a href="{{route('admin.vacanteinfo', $vacante)}}">Ver Vacante</a>
                </td>
                <td>
                    <a href="{{ route('admin.vacanteasign', $vacante) }}">Asignar Egresado</a>
                </td>
            </tr>
            @endforeach
            @else

            <tr>
                <td colspan="10">No se encontraron Vacantes</td>
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