@extends('Plantilla.plantilla')

@section('titulo','show')

@section('contenido')

    <h2><u><center>Descripcion del Proyecto</center></u></h2>
    </h1>  <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Datos</th>
            <th scope="col">Detalles</th>
        </thead>
        <tbody>
        <tr>
            <th scope="row">Nombre</th>
            <td>{{ $proyecto->nombre}}</td>
        </tr>

        <tr>
            <th scope="row">Descripcion</th>
            <td>{{ $proyecto->Descripcion}}</td>
        </tr>

        <tr>
            <th scope="row">Fecha de Inicio</th>
            <td>{{  $proyecto->fecha_inicio}}</td>
        </tr>

        <tr>
            <th scope="row">Fecha de Finalizacion</th>
            <td>{{  $proyecto->fecha_fin}}</td>
        </tr>
        </tbody>
    </table>

    <a class="btn btn-outline-secondary btn-lg" href="{{route('proyecto.index')}}">Regresar</a>


@endsection
