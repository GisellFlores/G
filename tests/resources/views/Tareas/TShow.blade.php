@extends('Plantilla.plantilla')

@section('titulo','show')

@section('contenido')

    <h2><u><center>Descripcion de la Tarea</center></u></h2>
    </h1>  <table class="table">
        <thead class="thead-light">
        <tr>
             <th scope="col">Datos</th>
            <th scope="col">Detalles</th>
        </thead>
        <tbody>
        <tr>
            <th scope="row">Nombre</th>
            <td>{{ $tarea->nombre}}</td>
        </tr>

        <tr>
            <th scope="row">Descripcion</th>
            <td>{{ $tarea->Descripcion}}</td>
        </tr>
        <tr>
            <th scope="row">Estado</th>
            <td>{{ $tarea->estado}}</td>
        </tr>

        <tr>
            <th scope="row">Fecha de Inicio</th>
            <td>{{ $tarea->fecha_inicio}}</td>
        </tr>

        <tr>
            <th scope="row">Fecha de Finalizacion</th>
            <td>{{ $tarea->fecha_fin}}</td>
        </tr>
        <tr>
            <th scope="row">Id de Proyecto</th>
            <td>{{ $tarea->proyecto_id}}</td>
        </tr>
        <tr>
            <th scope="row">Id de Usuario</th>
            <td>{{ $tarea->usuario_id}}</td>
        </tr>
        </tbody>
    </table>

    <a class="btn btn-outline-secondary btn-lg" href="{{route('tarea.index')}}">Regresar</a>


@endsection
