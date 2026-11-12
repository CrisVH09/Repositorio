<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Number of posts per blog page.
     */
    private const POSTS_PER_PAGE = 9;

    /**
     * Display the published blog posts.
     */
    public function index(): View
    {
        return view('posts.index', [
            'posts' => Post::published()->latest('published_at')->paginate(self::POSTS_PER_PAGE),
        ]);
    }

    /**
     * Display a single blog post.
     */
    public function show(Post $post): View
    {
        abort_unless($post->isPublished(), 404);

        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
