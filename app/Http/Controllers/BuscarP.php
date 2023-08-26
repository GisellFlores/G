<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class BuscarP extends Controller
{
    public function buscar(Request $request)
    {
        $proyectos = Proyecto::where('nombre', 'like', '%'.$request->nombre.'%')->paginate(10);
        return view('Proyectos.PIndex', compact('proyectos'));
    }
}
