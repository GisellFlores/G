<?php

namespace App\Http\Controllers;
use App\Models\Proyecto;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyecto = Proyecto::paginate(10);
        return view('Proyectos.PIndex')->with('proyectos',$proyecto);
    }

    public function create()
    {
        return view('Proyectos.PCreate');
    }

    public function store(Request $request)
    {
        $validados = $request->validate(
            [

                'nombre'=>'required|regex:/[A-Z][a-z]+/i',
                'descripcion'=>'required',
                'fecha_inicio'=>'required',
                'fecha_fin'=>'required',
            ]
        );

        $nuevoProyecto = new  Proyecto();
        $nuevoProyecto->nombre = $request->input('nombre');
        $nuevoProyecto->descripcion = $request->input('descripcion');
        $nuevoProyecto->fecha_inicio= $request->input('fecha_inicio');
        $nuevoProyecto->fecha_fin = $request->input('fecha_fin');

        if($nuevoProyecto->save()){
            $mensaje = " El Proyecto se creo exitosamente";
        }else {
            $mensaje = "No se pudo crear el proyecto, Intente nuevamente mas tarde";
        }

        return redirect()->route('proyecto.index')->with('mensaje', $mensaje);
    }

    public function show(string $id)
    {
        $proyecto = proyecto::findOrfail($id);
        return view('Proyectos.PShow', compact('proyecto'));
    }


    public function edit(string $id)
    {
        $proyecto = Proyecto::findOrfail($id);
        return view('Proyectos.PEdit')->with('proyecto',$proyecto);
    }


    public function update(Request $request, string $id)
    {
        $proyecto = Proyecto::findOrfail($id);

        $validados = $request->validate([
            'nombre'=>'required|regex:/[A-Z][a-z]+/i',Rule::unique('proyectos')->ignore( $proyecto->id),
            'descripcion'=>'required',
            'fecha_inicio'=>'required',
            'fecha_fin'=>'required',
        ]);


        $proyecto->nombre = $request->input('nombre');
        $proyecto->descripcion = $request->input('descripcion');
        $proyecto->fecha_inicio= $request->input('fecha_inicio');
        $proyecto->fecha_fin = $request->input('fecha_fin');


        if($proyecto->save()){
            $mensaje = " El Proyecto ". $proyecto->nombre. " se edito exitosamente";
        }else {
            $mensaje = " No se pudo editar el nombre de la tarea ". $proyecto->nombre ." Intente nuevamente mas tarde";
        }

        // Redirigir con mensaje de que se edito correctamente
        return redirect()->route('proyecto.index')->with('mensaje', $mensaje);


    }

    public function destroy(string $id){
        Proyecto::destroy($id);

        return redirect('/proyectos')
            ->with('mensaje', 'Proyecto Eliminado completamente');


    }

}
