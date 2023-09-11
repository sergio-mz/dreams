<?php

namespace Database\Factories;

use App\Models\Dome;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->words(2, true), // Genera un nombre compuesto por tres palabras aleatorias
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'dome_id' => function () {
                return Dome::inRandomOrder()->first()->id;
            },
            'status' => $this->faker->boolean,
            'description' => $this->faker->paragraph,
        ];
    }
}
