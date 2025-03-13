<?php

namespace Database\Factories;

use App\Models\Institucion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Institucion>
 */
class InstitucionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Institucion::class;

    public function definition(): array
    {
        return [
            'nombre' => fake()->company(),
            'domicilio' => fake()->streetAddress(),
            'correo' => substr(fake()->companyEmail(), 0, 40),
            'telefono' => substr(fake()->phoneNumber(), 0, 40),
            'ciudad_id' => fake()->numberBetween(1, 260),
            'pais_id' => fake()->numberBetween(1, 2),
            'representante' => fake()->name(),
        ];
    }
}
