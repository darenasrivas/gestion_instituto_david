<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

   /* definition, devuelve un array asociativo. */

    public function definition(): array
    {
        return [
            'nombre'=> fake()->name(),
            'apellido'=> fake()->lastname(),
            'direccion'=> fake()->address(),
            'telefono'=> fake()->phoneNumber(),
            //
        ];
    }
}
