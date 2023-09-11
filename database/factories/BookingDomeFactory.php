<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Dome;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookingDome>
 */
class BookingDomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dome = Dome::inRandomOrder()->first();
        return [
            'booking_id' => function () {
                return Booking::inRandomOrder()->first()->id;
            },
            'dome_id' => $dome->id,
            'price' => $dome->price,
        ];
    }
}
