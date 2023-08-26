<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    public function proyecto(){

        return $this->belongsTo('App\Models\Proyecto', 'proyecto_id' );
    }

    public function usuario(){

        return $this->belongsTo('App\Models\usuario', 'usuario_id' );
    }
    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
        'fecha_inicio',
        'fecha_fin',
        'proyecto_id',
        'usuario_id',

    ];

}
