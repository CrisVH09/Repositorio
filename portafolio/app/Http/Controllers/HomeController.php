<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Post;
use App\Models\Project;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Number of featured projects shown on the home page.
     */
    private const FEATURED_PROJECTS_LIMIT = 3;

    /**
     * Number of recent posts shown on the home page.
     */
    private const LATEST_POSTS_LIMIT = 3;

    /**
     * Show the portfolio home page.
     */
    public function __invoke(): View
    {
        return view('home', [
            'featuredProjects' => Project::published()->featured()->ordered()->take(self::FEATURED_PROJECTS_LIMIT)->get(),
            'experiences' => Experience::mostRecentFirst()->get(),
            'latestPosts' => Post::published()->latest('published_at')->take(self::LATEST_POSTS_LIMIT)->get(),
        ]);
    }
}
