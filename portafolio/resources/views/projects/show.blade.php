<x-layouts.app :title="$project->title" :description="$project->summary">
    <article class="mx-auto max-w-2xl pt-16 sm:pt-20">
        <a href="{{ route('projects.index') }}" class="text-sm text-stone-500 transition-colors hover:text-stone-900 dark:text-stone-400 dark:hover:text-stone-50">
            ← Proyectos
        </a>

        <header class="mt-10">
            <h1 class="font-serif text-4xl leading-tight font-normal tracking-tight text-balance text-stone-900 sm:text-5xl dark:text-stone-50">{{ $project->title }}</h1>
            <p class="mt-5 text-lg leading-relaxed text-pretty">{{ $project->summary }}</p>

            <dl class="mt-8 grid gap-4 border-y border-stone-200 py-5 text-sm sm:grid-cols-3 dark:border-stone-800">
                @if ($project->impact)
                    <div>
                        <dt class="text-stone-500 dark:text-stone-400">Resultado</dt>
                        <dd class="mt-1 font-medium text-stone-900 dark:text-stone-100">{{ $project->impact }}</dd>
                    </div>
                @endif
                @if ($project->tech_stack)
                    <div>
                        <dt class="text-stone-500 dark:text-stone-400">Tecnologías</dt>
                        <dd class="mt-1 text-stone-900 dark:text-stone-100">{{ implode(', ', $project->tech_stack) }}</dd>
                    </div>
                @endif
                @if ($project->demo_url || $project->repository_url)
                    <div>
                        <dt class="text-stone-500 dark:text-stone-400">Enlaces</dt>
                        <dd class="mt-1 flex flex-wrap gap-x-4">
                            @if ($project->demo_url)
                                <a href="{{ $project->demo_url }}" target="_blank" rel="noopener noreferrer" class="link">Demo</a>
                            @endif
                            @if ($project->repository_url)
                                <a href="{{ $project->repository_url }}" target="_blank" rel="noopener noreferrer" class="link">Código</a>
                            @endif
                        </dd>
                    </div>
                @endif
            </dl>
        </header>

        @if ($project->image_path)
            <img src="{{ asset($project->image_path) }}" alt="Vista previa de {{ $project->title }}" class="mt-10 w-full rounded-md border border-stone-200 dark:border-stone-800">
        @endif

        @if ($project->body)
            <div class="prose-content mt-10">
                {!! $project->body_html !!}
            </div>
        @endif
    </article>
</x-layouts.app>
