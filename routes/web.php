<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TareaController;
use \App\Http\Controllers\ProyectoController;
use \App\Http\Controllers\UsuarioController;
use \App\Http\Controllers\BuscarT;
use \App\Http\Controllers\BuscarP;
use \App\Http\Controllers\BuscarU;

Route::get('/', function () {
    return view('welcome');
});
//---RUTAS TAREAS---//
Route::get('/tareas', "\App\Http\Controllers\TareaController@index")
    ->name('tarea.index');

Route::get('/tareas/{id}',[TareaController::class,
    'show'])->whereNumber('id')->name('tareas.show');

Route::get('/tareas/crear','App\Http\Controllers\TareaController@create')
    ->name('tarea.crear');

Route::post('/tareas/crear','App\Http\Controllers\TareaController@store')
    ->name('tarea.store');

Route::get('/tareas/{id}/editar',[TareaController::class, 'edit'])
    ->whereNumber('id')->name('tareas.edit');

Route::put('/tareas/{id}/editar',[TareaController::class, 'update'])
    ->whereNumber('id')->name('tareas.update');

Route::delete('/tareas/{id}/borrar',[TareaController::class, 'destroy'])
    ->whereNumber('id')->name('tarea.borrar');
Route::get('/buscar', [BuscarT::class, 'buscar'])->name('tareas.buscar');





//---RUTAS PROYECTO---//

Route::get('/proyectos', "\App\Http\Controllers\ProyectoController@index")
    ->name('proyecto.index');

Route::get('/proyectos/{id}',[ProyectoController::class,'show'])
    ->whereNumber('id')->name('proyectos.show');

Route::get('/proyectos/crear','App\Http\Controllers\ProyectoController@create')
    ->name('proyecto.crear');

Route::post('/proyectos/crear','App\Http\Controllers\ProyectoController@store')
    ->name('proyecto.store');

Route::get('/proyectos/{id}/editar',[ProyectoController::class, 'edit'])
    ->whereNumber('id')->name('proyectos.edit');

Route::put('/proyectos/{id}/editar',[ProyectoController::class, 'update'])
    ->whereNumber('id')->name('proyectos.update');

Route::delete('/proyectos/{id}/borrar',[ProyectoController::class, 'destroy'])
    ->whereNumber('id')->name('proyecto.borrar');
Route::get('/buscar', [BuscarP::class, 'buscar'])->name('proyectos.buscar');


//---RUTAS USUARIO---//

Route::get('/usuarios', "\App\Http\Controllers\UsuarioController@index")
    ->name('usuario.index');

Route::get('/usuarios/{id}',[UsuarioController::class,'show'])
    ->whereNumber('id')->name('usuarios.show');

Route::get('/usuarios/crear','App\Http\Controllers\UsuarioController@create')
    ->name('usuario.crear');

Route::post('/pusuarios/crear','App\Http\Controllers\UsuarioController@store')
    ->name('usuario.store');

Route::get('/usuario/{id}/editar',[UsuarioController::class, 'edit'])
    ->whereNumber('id')->name('usuarios.edit');

Route::put('/usuarios/{id}/editar',[UsuarioController::class, 'update'])
    ->whereNumber('id')->name('usuario.update');

Route::delete('/usuarios/{id}/borrar',[UsuarioController::class, 'destroy'])
    ->whereNumber('id')->name('usuario.borrar');
Route::get('/buscar', [BuscarU::class, 'buscar'])->name('usuarios.buscar');

