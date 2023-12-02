<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->paragraph(),
            'min_price' => fake()->numberBetween(1, 100),
            'max_price' => fake()->numberBetween(100, 1000),
            'category_id' => ServiceCategory::query()->inRandomOrder()->first()->id,
        ];
    }
}
