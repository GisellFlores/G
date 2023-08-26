<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuario = Usuario::paginate(10);
        return view('usuarios.UIndex')->with('usuarios',$usuario);
    }

    public function create()
    {
        return view('usuarios.UCreate');
    }

    public function store(Request $request)
    {
        $validados = $request->validate(
            [

                'nombre'=>'required|regex:/[A-Z][a-z]+/i',
                'correo_electronico'=>'required|unique:usuarios|Email',
            ]
        );

        $nuevoUsuario = new  Usuario();
        $nuevoUsuario->nombre = $request->input('nombre');
        $nuevoUsuario->correo_electronico=$request->input('correo_electronico');

        if($nuevoUsuario->save()){
            $mensaje = " El Usuario se creo exitosamente";
        }else {
            $mensaje = "No se pudo crear el usuario, Intente nuevamente mas tarde";
        }

        return redirect()->route('usuario.index')->with('mensaje', $mensaje);
    }

    public function show(string $id)
    {
        $usuario = usuario::findOrfail($id);
        return view('Usuarios.UShow', compact('usuario'));
    }


    public function edit(string $id)
    {
        $usuario = Usuario::findOrfail($id);
        return view('Usuarios.UEdit')->with('usuario',$usuario);
    }


    public function update(Request $request, string $id)
    {
        $usuario = Usuario::findOrfail($id);

        $validados = $request->validate([
            'nombre'=>'required|regex:/[A-Z][a-z]+/i',Rule::unique('usuarios')->ignore( $usuario->id),
            'correo_electronico'=>'required|unique:usuarios|Email',
        ]);

        $usuario->nombre = $request->input('nombre');
        $usuario->correo_electronico=$request->input('correo_electronico');



        if($usuario->save()){
            $mensaje = " El Usuario ". $usuario->nombre. " se edito exitosamente";
        }else {
            $mensaje = " No se pudo editar el Usuario ". $usuario->nombre ." Intente nuevamente mas tarde";
        }

        // Redirigir con mensaje de que se edito correctamente
        return redirect()->route('usuario.index')->with('mensaje', $mensaje);


    }

    public function destroy(string $id){
        Usuario::destroy($id);

        return redirect('/usuarios')
            ->with('mensaje', 'Usuario Eliminado completamente');


    }


}
