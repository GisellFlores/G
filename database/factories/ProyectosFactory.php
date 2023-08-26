<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Proyecto;


class ProyectosFactory extends Factory
{

    public function definition(): array
    {
        return [
            'nombre' =>fake()->word(),
            'descripcion' =>fake()->text(),
            'fecha_inicio' =>fake()->dateTime(),
            'fecha_fin' =>fake()->dateTime(),
        ];
    }
}
