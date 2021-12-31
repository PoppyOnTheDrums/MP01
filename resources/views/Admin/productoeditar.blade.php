@extends('adminlte::page')


@section('title', 'Admin')

@section('content_header')
    <h1>Editar Producto</h1>
@stop

@section('content')
<form autocomplete="off" action="{{route('admin.productoupdate',$producto)}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

        <h1 class="text-center">Editar Producto</h1>
        <div class="container border border-success rounded py-4">
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre"  value="{{$producto->nombre}}" placeholder="Nombre...">
                </div>
            </div>
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Suplidor</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="suplidor" value="{{$producto->suplidor}}" placeholder="Suplidor...">
                </div>
            </div>
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="descripcion" placeholder="Descripcion...">{{$producto->descripcion}}</textarea>
                </div>
            </div>
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Modelo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="modelo" value="{{$producto->modelo}}" placeholder="Modelo...">
                </div>
            </div>
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Categoria</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="categoria" value="{{$producto->categoria}}" placeholder="Categoria...">
                </div>
            </div>
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Cantidad</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="cantidad" value="{{$producto->cantidad}}" placeholder="Cantidad...">
                </div>
            </div>
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Precio</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="precio" value="{{$producto->precio}}" placeholder="Precio...">
                </div>
            </div>
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Imagen</label>
                <div class="col-sm-10">
                    <input type="file" name="file" class="form-control-file">
                    <img src="{{asset('uploads/productos/'.$producto->foto)}}" alt="foto" class="img-thumbnail w-50 p-3W">
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