@extends('Plantilla.plantilla')

@section('titulo','create')

@section('contenido')

    <h1><center>Creacion de Usuarios</center></h1>

    @if ($errors->any())
        <div class="alert alert-Secondary btn-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="get" action="{{route('usuario.crear')}}">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del Usuario" value = "{{old('nombre')}}">
        </div>

        <br>
        <div class="form-group">
            <label for="correo_electronico">Correo Electronico</label>
            <input type="email" class="form-control" name="correo_electronico" id="correo_electronico" placeholder="Correo del Usuario" value = "{{old('correo_electronico')}}">
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-secondary btn-lg">Guardar</button>
            <a class="btn btn-outline-secondary btn-lg" href="{{route('usuario.index')}}">Cancelar</a>
        </div>

    </form>

@endsection()
