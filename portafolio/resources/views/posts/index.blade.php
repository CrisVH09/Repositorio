<x-layouts.app title="Blog" description="Artículos sobre desarrollo de software, Laravel y lo que voy aprendiendo.">
    <header class="pt-20 pb-14 sm:pt-24">
        <h1 class="font-serif text-4xl font-normal tracking-tight text-stone-900 sm:text-5xl dark:text-stone-50">Escritos</h1>
        <p class="mt-5 max-w-2xl text-lg leading-relaxed text-pretty">
            Notas sobre lo que voy aprendiendo mientras desarrollo software.
        </p>
    </header>

    @if ($posts->isNotEmpty())
        <div class="divide-y divide-stone-200 border-t border-stone-200 pt-8 dark:divide-stone-800 dark:border-stone-800">
            @foreach ($posts as $post)
                <x-post-card :post="$post" />
            @endforeach
        </div>

        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    @else
        <p class="text-stone-500">Todavía no hay artículos publicados.</p>
    @endif
</x-layouts.app>
