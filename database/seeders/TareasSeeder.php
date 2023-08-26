<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Tarea;

class TareasSeeder extends Seeder
{

    public function run(): void
    {
        Tarea::factory()->count(100)->create();
    }
}
