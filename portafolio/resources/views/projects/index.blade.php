<x-layouts.app title="Proyectos" description="Proyectos y casos de estudio de {{ config('portfolio.name') }}.">
    <header class="pt-20 pb-14 sm:pt-24">
        <h1 class="font-serif text-4xl font-normal tracking-tight text-stone-900 sm:text-5xl dark:text-stone-50">Proyectos</h1>
        <p class="mt-5 max-w-2xl text-lg leading-relaxed text-pretty">
            Sistemas en los que he trabajado. En cada uno cuento cuál era el problema, qué hice y qué resultado tuvo.
        </p>
    </header>

    @if ($projects->isNotEmpty())
        <div class="divide-y divide-stone-200 border-t border-stone-200 pt-8 dark:divide-stone-800 dark:border-stone-800">
            @foreach ($projects as $project)
                <x-project-card :project="$project" />
            @endforeach
        </div>
    @else
        <p class="text-stone-500">Todavía no hay proyectos publicados.</p>
    @endif
</x-layouts.app>
