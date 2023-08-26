@extends('Plantilla.plantilla')

@section('titulo','edit')

@section('contenido')

    <h1><center>Editar Usuario </center></h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{route('usuario.update', [$usuario->id])}}" class="needs-validation">
        @method("PUT")
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del Usuarios" value = "{{old('nombre') ?? $usuario->nombre}}">
        </div>

        <br>
        <div class="form-group">
            <label for="correo_electronico">Correo Electronico</label>
            <input type="email" class="form-control" name="correo_electronico" id="correo_electronico" placeholder="Correo del Usuario" value = "{{old('correo_electronico') ?? $usuario->corre_electronico}}">
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-secondary btn-lg">Guardar</button>
            <a class="btn btn-outline-secondary btn-lg" href="{{route('usuario.index')}}">Regresar</a>
        </div>

@endsection()

