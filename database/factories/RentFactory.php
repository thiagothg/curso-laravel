<?php

namespace Database\Factories;

use App\Models\App\Client;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rent>
 */
class RentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'period_start_data' => fake()->dateTime(),
            'date_final_expected_period' => fake()->dateTime(),
            'end_date_realized_period' => fake()->dateTime(),
            'price' => fake()->randomDigit(),
            'initial_km' => fake()->randomNumber(4, true),
            'final_km' => fake()->randomNumber(5, true),
            'client_id' => Client::factory(),
            'car_id' => Car::factory(),
        ];
    }
}
