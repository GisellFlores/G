@extends('plantilla.plantilla')

@section('titulo','index')

@section('contenido')

    @if(session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .pagination a {
            display: inline-block;
            margin: 0 5px;
            padding: 10px 15px;
            background-color: #fff;
            border: 1px solid #ddd;
            color: #333;
        }

        .pagination a:hover,
        .pagination a:focus {
            background-color: #f5f5f5;
        }

        .pagination .active a {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .pagination .disabled a {
            opacity: .5;
            pointer-events: none;
        }
    </style>

    <body>
    <div class="container">
        <h1 class="text-center my-4">Gestión de Tareas</h1>

        <div class="card shadow mb-4">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col text-right">

                    </div>
                </div>
            </div>
        </div>


        <h3><center><u>Tabla de Usuarios</u></center></h3>

    <td><u><a class="btn btn-outline-Info btn-lg" href="{{route('usuario.crear')}}" >Crear </a></u></td>

    <table class="table table-striped" class="pagination">
        <thead class="table-dark ">
        <tr>

            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo Electronico</th>
        </tr>
        </thead>
        <tbody>
        @forelse($usuarios as $usuario)
            <tr>
                <th scope="row">{{$usuario->id}}</th>
                <td>{{$usuario->nombre}}</td>
                <td>{{$usuario->correo_electronico}}</td>
                <td><a class="btn btn-outline-info btn-lg" href="{{route('usuarios.show',['id'=>$usuario->id])}}">Ver</a></td>
                <td><a class="btn btn-outline-warning btn-lg" href="{{route('usuarios.edit',['id'=>$usuario->id])}}">Editar</a></td>
                <td>

                <td>
                    <form  method="post" action="{{route('usuario.borrar',['id'=>$usuario->id])}}">
                        @csrf
                        @method('DELETE')

                        <input type="submit" value="Eliminar" class="btn btn-outline-success btn-lg">
                    </form>
                </td>

            </tr>
        @empty
            <tr><td colspan="3">No hay Usuarios</td></tr>
        @endforelse

        </tbody>
    </table>
    {{ $usuarios->render('pagination::bootstrap-4') }}
@endsection
