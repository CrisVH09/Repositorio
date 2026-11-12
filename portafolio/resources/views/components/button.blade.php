@props([
    'href' => null,
    'variant' => 'primary',
    'type' => 'button',
])

@php
    $classes = [
        'inline-flex items-center justify-center gap-2 rounded-md px-4 py-2 text-sm font-medium transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent-600 disabled:opacity-50',
        'bg-ink text-paper hover:bg-stone-700 dark:bg-stone-100 dark:text-stone-900 dark:hover:bg-white' => $variant === 'primary',
        'border border-stone-300 text-stone-800 hover:border-stone-500 dark:border-stone-700 dark:text-stone-200 dark:hover:border-stone-500' => $variant === 'secondary',
    ];
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class($classes) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->class($classes) }}>{{ $slot }}</button>
@endif
