<?php

namespace Database\Factories;

use App\Models\Plan;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PlanServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plan_id' => function () {
                return Plan::inRandomOrder()->first()->id;
            },
            'service_id' => function () {
                return Service::inRandomOrder()->first()->id;
            },
        ];
    }
}
