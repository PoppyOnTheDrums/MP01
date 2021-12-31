@extends('adminlte::page')


@section('title', 'Admin')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')

@if(session('Info'))
  <div class="alert alert-success">
      <strong>{{(session('Info'))}}</strong>
  </div>
@endif

<div class="card">
     <div class="card-body">
         <p class="h5">Nombre</p>
         <p class="form-control">{{$user->name}}</p>
         <h2 class="h5">Listado De roles</h2>

         {!! Form::model($user, ['route' => ['admin.userupdate', $user], 'method' => 'PUT']) !!}
         @foreach ($roles as $roles)
         <div>
             <label>
                 {!! Form::checkbox('roles[]', $roles->id, null,['class' => 'mr-1']) !!}
                 {{$roles->name}}
             </label>
         </div>
         @endforeach
         {!! Form::submit('Asignar Rol', ['class' => 'btn btn-primary mt-2']) !!}
         {!! Form::close()!!}
     </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop