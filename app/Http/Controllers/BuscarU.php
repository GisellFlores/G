<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuario;

class BuscarU extends Controller
{
    public function buscar(Request $request)
    {
        $usuarios = Usuario::where('nombre', 'like', '%'.$request->nombre.'%')->paginate(10);
        return view('Usuarios.UIndex', compact('usuarios'));
    }
}
