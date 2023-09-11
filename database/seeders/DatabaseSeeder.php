<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        // \App\Models\User::factory(10)->create();
        
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.net',
            'password' => bcrypt('12345678'),
        ])->assignRole('Admin');

        \App\Models\Dome::factory(10)->create();
        \App\Models\Customer::factory(50)->create();
        \App\Models\Service::factory(5)->create();
        \App\Models\Plan::factory(5)->create();
        \App\Models\Booking::factory(100)->create();
        \App\Models\BookingDome::factory(100)->create();
        \App\Models\BookingService::factory(100)->create();
    }
}
