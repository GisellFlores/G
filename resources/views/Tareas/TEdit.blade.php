@extends('Plantilla.plantilla')

@section('titulo','edit')

@section('contenido')

<h1><center>Editar Tareas </center></h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post" action="{{route('tareas.update', [$tarea->id])}}" class="needs-validation">
    @method("PUT")
    @csrf

    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la tarea" value = "{{old('nombre') ?? $tarea->nombre}}">
    </div>

    <br>
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion de la Tarea" value = "{{old('descripcion') ?? $tarea->descripcion}}">
    </div>

    <br>
    <div class="form-group">
        <label for="estado">Estado</label>
        <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado de la Tarea" value = "{{old('estado') ?? $tarea->estado}}">
    </div>

    <br>
    <div class="form-group">
        <label for="fecha_inicio">Fecha Inicio</label>
        <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha inicio de la Tarea" value = "{{old('fecha_inicio') ?? $tarea->fecha_inicio}}">
    </div>

    <br>
    <div class="form-group">
        <label for="fecha_fin">Fecha Fin</label>
        <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Fecha fin de la Tarea" value = "{{old('fecha_fin') ?? $tarea->fecha_fin}}">
    </div>

    <br>
    <div class="form-group">
        <label for="proyecto_id">Id del Proyecto</label>
        <input type="number" class="form-control" name="proyecto_id" id="proyecto_id" placeholder="Id del Proyecto" value = "{{old('proyecto_id') ?? $tarea->proyecto_id}}">
    </div>

    <br>
    <div class="form-group">
        <label for="usuario_id">Id del Usuario</label>
        <input type="number" class="form-control" name="usuario_id" id="usuario_id" placeholder="Id del Proyecto" value = "{{old('usuario_id') ?? $tarea->usuario_id}}">
    </div>

    <br>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-secondary btn-lg">Guardar</button>
        <a class="btn btn-outline-secondary btn-lg" href="{{route('tarea.index')}}">Regresar</a>
    </div>

@endsection()
