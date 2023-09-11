<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('-1 year', 'now');
        $endDate = $this->faker->dateTimeBetween($startDate, '+1 month');

        $subtotal = $this->faker->randomFloat(2, 100, 1000);
        $discount = $this->faker->randomFloat(2, 0, 100);
        $tax = $this->faker->randomFloat(2, 0, 50);
        $total = $subtotal * (1 - ($discount / 100)) * (1 + ($tax / 100));
        return [
            'start_date' => $startDate,
            'end_date' => $endDate,
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
            'customer_id' => function () {
                return Customer::inRandomOrder()->first()->id;
            },
            'subtotal' => $subtotal,
            'discount' => $discount,
            'tax' => $tax,
            'total' => $total,
        ];
    }
}
