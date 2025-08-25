<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'position' => $this->faker->jobTitle,
            'avatar' => $this->faker->imageUrl(100, 100, 'people'),
            'rating' => 5,
            'content' => $this->faker->paragraph,
        ];
    }
}
