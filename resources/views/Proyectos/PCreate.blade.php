@extends('Plantilla.plantilla')

@section('titulo','create')

@section('contenido')

    <h1><center>Creacion de Proyectos</center></h1>

    @if ($errors->any())
        <div class="alert alert-Secondary btn-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{route('proyecto.crear')}}">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del Proyecto" value = "{{old('nombre')}}">
        </div>

        <br>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion del Proyecto" value="{{old('descripcion')}}">
        </div>

        <br>
        <div class="form-group">
            <label for="fecha_inicio">Fecha Inicio</label>
            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha Inicio del Proyecto" value="{{old('fecha_inicio')}}">
        </div>

        <br>
        <div class="form-group">
            <label for="fecha_fin">Fecha de Fin</label>
            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Fecha fin del Proyecto" value="{{old('fecha_fin')}}">
        </div>

        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-secondary btn-lg">Guardar</button>
            <a class="btn btn-outline-secondary btn-lg" href="{{route('proyecto.index')}}">Cancelar</a>
        </div>

    </form>

@endsection()

