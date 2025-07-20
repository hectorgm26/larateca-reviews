<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Eso garantiza que las reseñas se asignan solo a los usuarios ya creados.
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'book_id' => Book::factory(),
            'title' => fake()->text(),
            'description' => fake()->text(150),
            'stars' => fake()->numberBetween(1, 5),
            'is_approved' => fake()->boolean(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
