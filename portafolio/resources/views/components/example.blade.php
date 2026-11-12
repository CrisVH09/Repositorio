@props([
    'title',
    'description' => null,
])

{{-- Shows a live preview of a component next to the Blade code that produces it. --}}
<div {{ $attributes->merge(['class' => 'space-y-3']) }}>
    <div>
        <h3 class="font-medium text-stone-900 dark:text-stone-50">{{ $title }}</h3>
        @if ($description)
            <p class="mt-1 text-sm text-stone-500 dark:text-stone-400">{{ $description }}</p>
        @endif
    </div>

    <div class="rounded-md border border-stone-200 bg-white p-6 dark:border-stone-800 dark:bg-stone-900/40">
        {{ $slot }}
    </div>

    @isset($code)
        <pre class="overflow-x-auto rounded-md bg-stone-900 p-4 font-mono text-[13px] leading-relaxed text-stone-100 dark:ring-1 dark:ring-stone-800"><code>{{ $code }}</code></pre>
    @endisset
</div>
