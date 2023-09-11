<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookingService>
 */
class BookingServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $service = Service::inRandomOrder()->first();
        $quantity = $this->faker->numberBetween(1, 3);
        return [
            'booking_id' => function () {
                return Booking::inRandomOrder()->first()->id;
            },
            'service_id' => $service->id,
            'price' => $service->price, // Utiliza el precio del servicio asociado al ID de servicio
            'quantity' => $quantity,
        ];
    }
}
