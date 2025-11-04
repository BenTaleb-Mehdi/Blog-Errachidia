<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     public function definition(): array
    {
        $title = fake()->unique()->sentence(4);
        return [
            'user_id'=> User::inRandomOrder()->value('id') ?? 1,
            'title'=> $title,
            'slug'=> Str::slug($title),
            'excrept'=>fake()->sentence(12),
            'content'=> fake()->paragraphs(3, true),
        ];
    }
}
