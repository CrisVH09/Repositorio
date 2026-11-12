<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Seed sample blog posts. Replace them with your real articles.
     */
    public function run(): void
    {
        Post::factory()->count(4)->create();
    }
}
