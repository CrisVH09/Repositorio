<x-layouts.app :title="$post->title" :description="$post->excerpt">
    <article class="mx-auto max-w-2xl pt-16 sm:pt-20">
        <a href="{{ route('posts.index') }}" class="text-sm text-stone-500 transition-colors hover:text-stone-900 dark:text-stone-400 dark:hover:text-stone-50">
            ← Escritos
        </a>

        <header class="mt-10">
            <p class="text-sm text-stone-500 dark:text-stone-400">
                <time datetime="{{ $post->published_at->toDateString() }}">{{ $post->published_at->translatedFormat('d \d\e F, Y') }}</time>
                · {{ $post->reading_time_in_minutes }} min de lectura
            </p>
            <h1 class="mt-4 font-serif text-4xl leading-tight font-normal tracking-tight text-balance text-stone-900 sm:text-5xl dark:text-stone-50">{{ $post->title }}</h1>

            @if ($post->tags)
                <ul class="mt-6 flex flex-wrap gap-2" aria-label="Etiquetas">
                    @foreach ($post->tags as $tag)
                        <li><x-tech-badge>{{ $tag }}</x-tech-badge></li>
                    @endforeach
                </ul>
            @endif
        </header>

        <div class="prose-content mt-10 border-t border-stone-200 pt-10 dark:border-stone-800">
            {!! $post->body_html !!}
        </div>
    </article>
</x-layouts.app>
