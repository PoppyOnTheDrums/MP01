@extends('adminlte::page')


@section('title', 'Admin')

@section('content_header')
<h1>Ventana de empresas</h1>
@stop

@section('content')
<div class="container">
    <form action="{{route('admin.empresa')}}" method="get">
        <input type="search" name="query" placeholder="Buscar...">
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Industria</th>
                <th>Provincia</th>
                <th width="150px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($data) && $data->count())
            @foreach($data as $key => $empresa)
            <tr>
                <td>{{ $empresa->user_id }}</td>
                <td>{{ $empresa->nombre }}</td>
                <td>{{ $empresa->industria }}</td>
                <td>{{ $empresa->provincia }}</td>
                <td>
                    <a href="{{route('admin.empresainfo', $empresa)}}">Ver Egresado</a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="10">No se encontraron Empresas</td>
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