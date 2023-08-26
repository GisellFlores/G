<?php

namespace App\Http\Controllers;
use App\Models\Tarea;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;


class TareaController extends Controller
{
    public function index()
    {
        $tarea = Tarea::paginate(10);
        return view('Tareas.TIndex')->with('tareas',$tarea);
    }

    public function create()
    {
        return view('Tareas.TCreate');
    }

    public function store(Request $request)
    {
        $validados = $request->validate(
            [

                'nombre'=>'required|regex:/[A-Z][a-z]+/i',
                'descripcion'=>'required',
                'estado'=>'required',
                'fecha_inicio'=>'required',
                'fecha_fin'=>'required',
                'proyecto_id'=>'required|numeric|min:1|max:100',
                'usuario_id'=>'required|numeric|min:1|max:100',
            ]
        );

        $nuevoTarea = new Tarea();
        $nuevoTarea->nombre = $request->input('nombre');
        $nuevoTarea->descripcion = $request->input('descripcion');
        $nuevoTarea->estado = $request->input('estado');
        $nuevoTarea->fecha_inicio= $request->input('fecha_inicio');
        $nuevoTarea->fecha_fin = $request->input('fecha_fin');
        $nuevoTarea->proyecto_id= $request->input('proyecto_id');
        $nuevoTarea->usuario_id= $request->input('usuario_id');

        if($nuevoTarea->save()){
            $mensaje = " La Tarea se creo exitosamente";
        }else {
            $mensaje = "No se pudo crear la tarea, Intente nuevamente mas tarde";
        }

        return redirect()->route('tarea.index')->with('mensaje', $mensaje);
    }

    public function show(string $id)
    {
        $tarea = tarea::findOrfail($id);
        return view('Tareas.TShow', compact('tarea'));
    }


    public function edit(string $id)
    {
        $tarea = Tarea::findOrfail($id);
        return view('Tareas.TEdit')->with('tarea',$tarea);
    }


    public function update(Request $request, string $id)
    {
        $tarea = Tarea::findOrfail($id);

        $validados = $request->validate([
            'nombre'=>'required|regex:/[A-Z][a-z]+/i',Rule::unique('tareas')->ignore( $tarea->id),
            'descripcion'=>'required',
            'estado'=>'required',
            'fecha_inicio'=>'required',
            'fecha_fin'=>'required',
            'proyecto_id'=>'required|numeric|min:1|max:100',
            'usuario_id'=>'required|numeric|min:1|max:100',

        ]);


        $tarea->nombre = $request->input('nombre');
        $tarea->descripcion = $request->input('descripcion');
        $tarea->estado = $request->input('estado');
        $tarea->fecha_inicio= $request->input('fecha_inicio');
        $tarea->fecha_fin = $request->input('fecha_fin');
        $tarea->proyecto_id= $request->input('proyecto_id');
        $tarea->usuario_id= $request->input('usuario_id');

        if($tarea->save()){
            $mensaje = " La tarea ". $tarea->nombre. " se edito exitosamente";
        }else {
            $mensaje = " No se pudo editar el nombre de la tarea ". $tarea->nombre ." Intente nuevamente mas tarde";
        }

        // Redirigir con mensaje de que se edito correctamente
        return redirect()->route('tarea.index')->with('mensaje', $mensaje);


    }

    public function destroy(string $id){
        Tarea::destroy($id);

        return redirect('/tareas')
            ->with('mensaje', 'Tarea Eliminada completamente');


    }





}
