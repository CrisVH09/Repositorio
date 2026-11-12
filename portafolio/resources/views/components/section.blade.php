@props([
    'id' => null,
    'title',
])

{{-- Two-column editorial section: a small label on the left, content on the right. --}}
<section @if ($id) id="{{ $id }}" @endif {{ $attributes->merge(['class' => 'grid gap-6 border-t border-stone-200 py-14 sm:grid-cols-[10rem_1fr] sm:gap-10 dark:border-stone-800']) }}>
    <div>
        <h2 class="text-sm font-medium text-stone-900 sm:sticky sm:top-10 dark:text-stone-100">{{ $title }}</h2>
    </div>

    <div class="min-w-0">
        {{ $slot }}

        @isset($action)
            <div class="mt-8 text-sm">{{ $action }}</div>
        @endisset
    </div>
</section>
