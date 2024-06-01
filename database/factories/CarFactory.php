<?php

namespace Database\Factories;

use App\Models\Modelo;
use Faker\Provider\FakeCar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new FakeCar($this->faker));

        return [
            'plate' => $this->faker->vehicleRegistration,
            'available' => fake()->boolean(),
            'km' => fake()->randomNumber(5, true),
            'modelos_id' => Modelo::all()->random()->id, //Modelo::factory(1),
        ];
    }
}
