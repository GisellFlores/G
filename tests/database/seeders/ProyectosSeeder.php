<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Proyecto;

class ProyectosSeeder extends Seeder
{

    public function run(): void
    {
       Proyecto::factory()->count(100)->create();
    }
}
