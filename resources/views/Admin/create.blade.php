@extends('adminlte::page')


@section('title', 'Admin')

@section('content_header')
    <h1>Crear Producto</h1>
@stop

@section('content')

<form autocomplete="off" action="{{route('admin.productostore')}}" method="POST" enctype="multipart/form-data">
@csrf

        <h1 class="text-center">Producto</h1>
        <div class="container border border-success rounded py-4">
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
                <label class="col-sm-2 col-form-label">Suplidor</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="suplidor" placeholder="Suplidor...">
                    @error('suplidor')
                    <small class="text-danger">*Campo requerido</small>
                    <br>
                    @enderror
                </div>
            </div>
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="descripcion" placeholder="Descripcion..."></textarea>
                    @error('descripcion')
                    <small class="text-danger">*Campo requerido</small>
                    <br>
                    @enderror
                </div>
            </div>
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Modelo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="modelo" placeholder="Modelo...">
                    @error('modelo')
                    <small class="text-danger">*Campo requerido</small>
                    <br>
                    @enderror
                </div>
            </div>
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Categoria</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="categoria" placeholder="Categoria...">
                    @error('categoria')
                    <small class="text-danger">*Campo requerido</small>
                    <br>
                    @enderror
                </div>
            </div>
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Cantidad</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="cantidad" placeholder="Cantidad...">
                    @error('cantidad')
                    <small class="text-danger">*Campo requerido</small>
                    <br>
                    @enderror
                </div>
            </div>
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Precio</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="precio" placeholder="Precio...">
                    @error('precio')
                    <small class="text-danger">*Campo requerido</small>
                    <br>
                    @enderror
                </div>
            </div>
            <div class="form-group row mx-auto px-4 py-2">
                <label class="col-sm-2 col-form-label">Imagen</label>
                <div class="col-sm-10">
                    <input type="file" name="file" class="form-control-file">
                    @error('file')
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
   <!--  <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop