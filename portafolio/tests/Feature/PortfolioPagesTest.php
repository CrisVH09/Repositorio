<?php

namespace Tests\Feature;

use App\Models\Experience;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortfolioPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_shows_featured_projects_experience_and_posts(): void
    {
        $featuredProject = Project::factory()->featured()->create(['title' => 'Proyecto Destacado']);
        $regularProject = Project::factory()->create(['title' => 'Proyecto Normal']);
        $experience = Experience::factory()->current()->create(['company' => 'Acme Corp']);
        $post = Post::factory()->create(['title' => 'Mi primer artículo']);

        $response = $this->get(route('home'));

        $response->assertOk()
            ->assertSee(config('portfolio.name'))
            ->assertSee($featuredProject->title)
            ->assertDontSee($regularProject->title)
            ->assertSee($experience->company)
            ->assertSee($post->title);
    }

    public function test_home_page_shows_project_impact_and_experience_highlights(): void
    {
        Project::factory()->featured()->create(['impact' => '+5,000 citas registradas']);
        Experience::factory()->current()->create(['highlights' => ['Módulo de gestión de guardias médicas.']]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('+5,000 citas registradas')
            ->assertSee('Módulo de gestión de guardias médicas.');
    }

    public function test_home_page_renders_without_content(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Pronto publicaré mis proyectos aquí.');
    }

    public function test_projects_index_lists_only_published_projects(): void
    {
        $publishedProject = Project::factory()->create(['title' => 'Proyecto Publicado']);
        $draftProject = Project::factory()->draft()->create(['title' => 'Proyecto Borrador']);

        $this->get(route('projects.index'))
            ->assertOk()
            ->assertSee($publishedProject->title)
            ->assertDontSee($draftProject->title);
    }

    public function test_project_page_renders_the_case_study_markdown(): void
    {
        $project = Project::factory()->create([
            'body' => "## El reto\n\nTexto del caso de estudio.",
        ]);

        $this->get(route('projects.show', $project))
            ->assertOk()
            ->assertSee($project->title)
            ->assertSee('<h2>El reto</h2>', escape: false);
    }

    public function test_draft_project_page_is_not_found(): void
    {
        $project = Project::factory()->draft()->create();

        $this->get(route('projects.show', $project))->assertNotFound();
    }

    public function test_blog_index_lists_only_published_posts(): void
    {
        $publishedPost = Post::factory()->create(['title' => 'Artículo Publicado']);
        $draftPost = Post::factory()->draft()->create(['title' => 'Artículo Borrador']);

        $this->get(route('posts.index'))
            ->assertOk()
            ->assertSee($publishedPost->title)
            ->assertDontSee($draftPost->title);
    }

    public function test_post_page_strips_raw_html_from_markdown(): void
    {
        $post = Post::factory()->create([
            'body' => "Texto seguro.\n\n<script>alert('xss')</script>",
        ]);

        $this->get(route('posts.show', $post))
            ->assertOk()
            ->assertSee('Texto seguro.')
            ->assertDontSee("<script>alert('xss')</script>", escape: false);
    }

    public function test_draft_post_page_is_not_found(): void
    {
        $post = Post::factory()->draft()->create();

        $this->get(route('posts.show', $post))->assertNotFound();
    }
}
