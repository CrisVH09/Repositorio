@props(['experience'])

<li {{ $attributes->merge(['class' => 'grid gap-x-8 gap-y-1 sm:grid-cols-[8.5rem_1fr]']) }}>
    <p class="text-sm text-stone-500 tabular-nums sm:pt-0.5 dark:text-stone-400">
        {{ $experience->started_at->translatedFormat('M Y') }} – {{ $experience->is_current ? 'hoy' : $experience->ended_at->translatedFormat('M Y') }}
    </p>

    <div>
        <h3 class="font-medium text-stone-900 dark:text-stone-50">
            {{ $experience->role }},
            @if ($experience->company_url)
                <a href="{{ $experience->company_url }}" target="_blank" rel="noopener noreferrer" class="link">{{ $experience->company }}</a>
            @else
                {{ $experience->company }}
            @endif
        </h3>

        @if ($experience->description)
            <p class="mt-2 leading-relaxed">{{ $experience->description }}</p>
        @endif

        @if ($experience->highlights)
            <ul class="mt-3 space-y-1.5 text-[15px] leading-relaxed">
                @foreach ($experience->highlights as $highlight)
                    <li class="relative pl-4 before:absolute before:left-0 before:text-stone-400 before:content-['–']">{{ $highlight }}</li>
                @endforeach
            </ul>
        @endif

        @if ($experience->tech_stack)
            <p class="mt-3 text-sm text-stone-500 dark:text-stone-400">
                <span class="sr-only">Tecnologías: </span>{{ implode(' · ', $experience->tech_stack) }}
            </p>
        @endif
    </div>
</li>
