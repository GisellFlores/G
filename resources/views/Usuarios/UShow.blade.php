@extends('Plantilla.plantilla')

@section('titulo','show')

@section('contenido')

    <h2><u><center>Descripción del Usuario</center></u></h2>
    </h1>  <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Datos</th>
            <th scope="col">Detalles</th>
        </thead>
        <tbody>
        <tr>
            <th scope="row">Nombre</th>
            <td>{{ $usuario->nombre}}</td>
        </tr>

        <tr>
            <th scope="row">Descripción</th>
            <td>{{ $usuario->correo_electronico}}</td>
        </tr>


        </tbody>
    </table>

    <a class="btn btn-outline-secondary btn-lg" href="{{route('usuario.index')}}">Regresar</a>


@endsection
