<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->words(3, true);

        return [
            'title' => Str::title($title),
            'slug' => Str::slug($title),
            'summary' => fake()->sentence(16),
            'impact' => null,
            'body' => implode("\n\n", fake()->paragraphs(4)),
            'tech_stack' => fake()->randomElements(['Laravel', 'PHP', 'MySQL', 'Tailwind CSS', 'Alpine.js', 'Vue', 'Redis', 'Docker'], 3),
            'image_path' => null,
            'repository_url' => 'https://github.com/'.fake()->userName().'/'.Str::slug($title),
            'demo_url' => fake()->optional()->url(),
            'is_featured' => false,
            'sort_order' => 0,
            'published_at' => fake()->dateTimeBetween('-2 years', '-1 day'),
        ];
    }

    /**
     * Indicate that the project is highlighted on the home page.
     */
    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_featured' => true,
        ]);
    }

    /**
     * Indicate that the project is still a draft.
     */
    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'published_at' => null,
        ]);
    }
}
