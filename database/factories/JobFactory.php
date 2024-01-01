<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'Salary' => fake()->numberBetween(10000, 1000000),
            'location' => fake()->city(),
            'category' => fake()->randomElement(Job::$category),
            'experience' => collect(Job::$experiences)->random()
        ];
    }
}
