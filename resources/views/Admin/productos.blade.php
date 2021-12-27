@extends('adminlte::page')


@section('title', 'Admin')

@section('content_header')
    <h1>Productos</h1>
@stop

@section('content')

@foreach($producto as $producto)
<div class="container ">
    <div class="card ">
        <div class="card-body">
            <div class="row">
                <div class="col col-md-6">
                    <img src="{{asset('uploads/productos/'.$producto->foto)}}" alt="foto"class="img-thumbnail w-50 p-3W">

                </div>
                <div class="col col-md-6">
                    <h1>{{$producto->nombre}}</h1>
                    <p>{{$producto->modelo}}</p>
                    <p>{{$producto->descripcion}}</p>
                </div>
            </div>
            <a href="{{route('admin.productosedit',$producto)}}"><button>editar</button></a>

            <form action="{{route('admin.productosdelete',$producto)}}" method="POST" >
                @csrf
                @method('delete')
                <button type="submit">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endforeach

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop