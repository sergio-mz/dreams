<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'document' => $this->faker->unique()->randomNumber(6),
            'name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'cellphone' => $this->faker->unique()->phoneNumber,
            'birthdate' => $this->faker->date,
            'city' => 'Medellín', // Valor predeterminado para la ciudad
            'address' => $this->faker->streetAddress, // Dirección aleatoria (opcional)
        ];
    }
}
