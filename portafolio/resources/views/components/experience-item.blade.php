@props([
    'period',
    'role',
    'company',
    'companyUrl' => null,
    'description' => null,
    'highlights' => [],
    'stack' => [],
])

{{-- Use inside an <ol> or <ul>: each item renders as an <li>. --}}
<li {{ $attributes->merge(['class' => 'grid gap-x-8 gap-y-1 sm:grid-cols-[8.5rem_1fr]']) }}>
    <p class="text-sm text-stone-500 tabular-nums sm:pt-0.5 dark:text-stone-400">{{ $period }}</p>

    <div>
        <h3 class="font-medium text-stone-900 dark:text-stone-50">
            {{ $role }},
            @if ($companyUrl)
                <a href="{{ $companyUrl }}" target="_blank" rel="noopener noreferrer" class="link">{{ $company }}</a>
            @else
                {{ $company }}
            @endif
        </h3>

        @if ($description)
            <p class="mt-2 leading-relaxed">{{ $description }}</p>
        @endif

        @if ($highlights)
            <ul class="mt-3 space-y-1.5 text-[15px] leading-relaxed">
                @foreach ($highlights as $highlight)
                    <li class="relative pl-4 before:absolute before:left-0 before:text-stone-400 before:content-['–']">{{ $highlight }}</li>
                @endforeach
            </ul>
        @endif

        @if ($stack)
            <p class="mt-3 text-sm text-stone-500 dark:text-stone-400">
                <span class="sr-only">Tecnologías: </span>{{ implode(' · ', $stack) }}
            </p>
        @endif
    </div>
</li>
