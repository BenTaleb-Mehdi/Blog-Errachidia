<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\article>
 */
class articleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         $title = $this->faker->sentence(6, true); 
        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . $this->faker->unique()->numberBetween(1, 1000),
            'content' => $this->faker->paragraphs(5, true),
            'image' => $this->faker->imageUrl(800, 600, 'nature', true),
            'category' => $this->faker->randomElement(['Agriculture', 'Education', 'Health', 'Environment']),
            'region' => $this->faker->city(),
            'views' => $this->faker->numberBetween(0, 500),
            'shares' => $this->faker->numberBetween(0, 100),
            'status' => $this->faker->randomElement(['Draft', 'Published', 'Archived']),
            'author_id' => User::inRandomOrder()->first()?->id, 
            'published_at' => $this->faker->optional()->dateTimeThisYear(),
            'is_accepted' => $this->faker->boolean(70), 
        ];
    }
}
