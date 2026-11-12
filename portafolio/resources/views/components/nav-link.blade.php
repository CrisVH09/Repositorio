@props(['active' => false])

<a
    @if ($active) aria-current="page" @endif
    {{ $attributes->class([
        'text-sm transition-colors',
        'text-stone-900 underline decoration-accent-500 decoration-2 underline-offset-[10px] dark:text-stone-50' => $active,
        'text-stone-500 hover:text-stone-900 dark:text-stone-400 dark:hover:text-stone-50' => ! $active,
    ]) }}
>
    {{ $slot }}
</a>
