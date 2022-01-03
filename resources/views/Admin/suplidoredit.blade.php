@extends('adminlte::page')


@section('title', 'Admin')

@section('content_header')
    <h1>editar</h1>
@stop

@section('content')
<form autocomplete="off" action="{{route('admin.suplidorupdate', $suplidor)}}" method="POST">
@method('PUT')
@csrf


        <h1 class="text-center">Suplidor</h1>
        <div class="container border  py-4 shadow p-3 mb-5 bg-white rounded">
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre..." value="{{$suplidor->nombre}}">
                </div>
            </div>
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Telefono</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telefono" placeholder="Telefono..." value="{{$suplidor->telefono}}">
                </div>
            </div>
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Direccion</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="direccion" placeholder="Direccion...">{{$suplidor->direccion}}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-md d-block mx-auto my-2">Editar</button>
        </div>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop