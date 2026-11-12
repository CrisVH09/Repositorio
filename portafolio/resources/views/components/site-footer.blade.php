<footer class="mx-auto max-w-4xl px-6">
    <div class="flex flex-col gap-4 border-t border-stone-200 py-10 text-sm text-stone-500 sm:flex-row sm:items-center sm:justify-between dark:border-stone-800 dark:text-stone-400">
        <p>&copy; {{ now()->year }} {{ config('portfolio.name') }} · {{ config('portfolio.location') }}</p>

        <x-social-links />
    </div>
</footer>
