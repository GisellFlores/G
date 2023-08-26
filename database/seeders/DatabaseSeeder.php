<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Tareas;
use  App\Models\Proyectos;
use  App\Models\Usuarios;



class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(TareasSeeder::class);
        $this->call(ProyectosSeeder::class);
        $this->call(UsuariosSeeder::class);
    }
}
