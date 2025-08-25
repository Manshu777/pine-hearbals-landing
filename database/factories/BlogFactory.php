<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    protected $model = \App\Models\Blog::class;

    public function definition(): array
    {
        $title = $this->faker->sentence;
        return [
            'title' => $title,
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(600, 400, 'business'),
            'slug' => Str::slug($title),
        ];
    }
}