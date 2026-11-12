@props([
    'title',
    'href' => '#',
    'date' => null,
    'excerpt' => null,
    'readingTime' => null,
])

<article {{ $attributes->merge(['class' => 'group relative grid gap-x-8 gap-y-1 py-5 first:pt-0 sm:grid-cols-[8.5rem_1fr]']) }}>
    <p class="text-sm text-stone-500 tabular-nums sm:pt-1 dark:text-stone-400">{{ $date }}</p>

    <div>
        <h3 class="font-serif text-lg font-medium text-stone-900 dark:text-stone-50">
            <a href="{{ $href }}" class="decoration-accent-500 decoration-2 underline-offset-4 after:absolute after:inset-0 group-hover:underline">{{ $title }}</a>
        </h3>

        @if ($excerpt)
            <p class="mt-1 text-[15px] leading-relaxed">{{ $excerpt }}</p>
        @endif

        @if ($readingTime)
            <p class="mt-1 text-sm text-stone-500 dark:text-stone-400">{{ $readingTime }} min de lectura</p>
        @endif
    </div>
</article>
