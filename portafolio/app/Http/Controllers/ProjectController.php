<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display every published project.
     */
    public function index(): View
    {
        return view('projects.index', [
            'projects' => Project::published()->ordered()->get(),
        ]);
    }

    /**
     * Display a single project as a case study.
     */
    public function show(Project $project): View
    {
        abort_unless($project->isPublished(), 404);

        return view('projects.show', [
            'project' => $project,
        ]);
    }
}
