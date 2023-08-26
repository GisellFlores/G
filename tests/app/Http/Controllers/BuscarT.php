<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class BuscarT extends Controller
{
    public function buscar(Request $request)
    {
        $tareas = Tarea::where('nombre', 'like', '%'.$request->nombre.'%')->paginate(10);
        return view('Tareas.TIndex', compact('tareas'));
    }

}
