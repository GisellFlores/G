<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear un nuevo libro</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>


<body>

<div class="container">
    <h1>Resultados de la búsqueda</h1>
    @if ($tareas->isEmpty())
        <p>No se encontraron resultados</p>
    @else
        <ul>
            @foreach ($tareas as $tarea)
                <li>{{ $tarea->nombre }}</li>
            @endforeach
        </ul>
    @endif
</div>
