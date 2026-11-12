<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = rtrim(fake()->unique()->sentence(5), '.');

        $body = implode("\n\n", [
            '## Introducción',
            ...fake()->paragraphs(3),
            "```php\nRoute::get('/', HomeController::class);\n```",
            ...fake()->paragraphs(2),
        ]);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => fake()->sentence(20),
            'body' => $body,
            'tags' => fake()->randomElements(['laravel', 'php', 'tailwind', 'testing', 'arquitectura'], 2),
            'published_at' => fake()->dateTimeBetween('-1 year', '-1 day'),
        ];
    }

    /**
     * Indicate that the post is still a draft.
     */
    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'published_at' => null,
        ]);
    }
}
