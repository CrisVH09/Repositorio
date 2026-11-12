<?php

namespace Database\Factories;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startedAt = fake()->dateTimeBetween('-6 years', '-2 years');

        return [
            'role' => fake()->randomElement(['Desarrollador Backend', 'Desarrollador Full Stack', 'Desarrollador Web']),
            'company' => fake()->company(),
            'company_url' => fake()->optional()->url(),
            'location' => fake()->city(),
            'description' => fake()->paragraph(),
            'highlights' => fake()->sentences(2),
            'tech_stack' => fake()->randomElements(['Laravel', 'PHP', 'MySQL', 'Vue', 'Tailwind CSS', 'AWS'], 3),
            'started_at' => $startedAt,
            'ended_at' => fake()->dateTimeBetween($startedAt, '-1 month'),
        ];
    }

    /**
     * Indicate that this is the current position.
     */
    public function current(): static
    {
        return $this->state(fn (array $attributes) => [
            'ended_at' => null,
        ]);
    }
}
