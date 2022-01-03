@extends('adminlte::page')


@section('title', 'Admin')

@section('content_header')
    <h1>Suplidores</h1>
@stop

@section('content')
<form autocomplete="off" action="{{route('admin.suplidorstore')}}" method="POST">
@csrf

        <h1 class="text-center">Suplidor</h1>
        <div class="container border  py-4 shadow p-3 mb-5 bg-white rounded">
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre...">
                    @error('nombre')
                    <small class="text-danger">*Campo requerido</small>
                    <br>
                    @enderror
                </div>
            </div>
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Telefono</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telefono" placeholder="Telefono...">
                    @error('telefono')
                    <small class="text-danger">*Campo requerido</small>
                    <br>
                    @enderror
                </div>
            </div>
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Direccion</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="direccion" placeholder="Direccion..."></textarea>
                    @error('direccion')
                    <small class="text-danger">*Campo requerido</small>
                    <br>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-md d-block mx-auto my-2">Agregar</button>
        </div>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop