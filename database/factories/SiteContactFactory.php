<?php

namespace Database\Factories;

use App\Enums\Site\TypeResaonEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SiteContact;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteContato>
 */
class SiteContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = SiteContact::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->cellphoneNumber(),
            'message' => fake()->realText(),
            'reason' => fake()->randomElement(TypeResaonEnum::toArray()),
        ];
    }
}
