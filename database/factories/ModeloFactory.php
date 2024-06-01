<?php

namespace Database\Factories;

use App\Models\Brand;
use Faker\Provider\FakeCar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Modelo>
 */
class ModeloFactory extends Factory
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
            'name' => $this->faker->vehicleModel,
            'image' => fake()->unique()->image(dir: storage_path('app/public/brand'),  fullPath: false),
            'dors_numbers' => $this->faker->vehicleDoorCount,
            'places' =>  $this->faker->vehicleSeatCount,
            'air_bag' => fake()->boolean(),
            'abs' => fake()->boolean(),
            'brand_id' =>  Brand::all()->random()->id, //Brand::factory(),
        ];
    }
}
