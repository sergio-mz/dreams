<?php

namespace Database\Factories;

use App\Models\Dome;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dome>
 */
class DomeFactory extends Factory
{
    protected $model = Dome::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word,
            'status' => $this->faker->boolean,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'location' => $this->faker->address,
            'description' => $this->faker->paragraph,
            'capacity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
