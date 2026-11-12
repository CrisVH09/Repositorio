@props(['project'])

{{-- A project rendered as a list row: title and summary, with the key result alongside. --}}
<article {{ $attributes->merge(['class' => 'group relative grid gap-x-8 gap-y-2 py-6 first:pt-0 sm:grid-cols-[1fr_11rem]']) }}>
    <div>
        <h3 class="font-serif text-xl font-medium text-stone-900 dark:text-stone-50">
            <a href="{{ route('projects.show', $project) }}" class="decoration-accent-500 decoration-2 underline-offset-4 after:absolute after:inset-0 group-hover:underline">
                {{ $project->title }}
            </a>
        </h3>

        <p class="mt-2 max-w-prose leading-relaxed">{{ $project->summary }}</p>

        @if ($project->tech_stack)
            <p class="mt-3 text-sm text-stone-500 dark:text-stone-400">
                <span class="sr-only">Tecnologías: </span>{{ implode(' · ', $project->tech_stack) }}
            </p>
        @endif
    </div>

    <div class="text-sm text-stone-500 sm:pt-1.5 sm:text-right dark:text-stone-400">
        @if ($project->impact)
            <p class="font-medium text-stone-900 dark:text-stone-100">{{ $project->impact }}</p>
        @endif
        @if ($project->published_at)
            <p>{{ $project->published_at->year }}</p>
        @endif
    </div>
</article>
