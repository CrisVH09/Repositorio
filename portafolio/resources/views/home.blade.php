<x-layouts.app>
    {{-- Intro --}}
    <section class="pt-20 pb-16 sm:pt-28 sm:pb-24">
        <p class="text-sm text-stone-500 dark:text-stone-400">
            {{ config('portfolio.role') }} · {{ config('portfolio.location') }}
        </p>

        <h1 class="mt-6 max-w-3xl font-serif text-4xl leading-[1.1] font-normal tracking-tight text-balance text-stone-900 sm:text-[3.5rem] dark:text-stone-50">
            {{ config('portfolio.headline') }}
        </h1>

        <p class="mt-8 max-w-2xl text-lg leading-relaxed text-pretty [&_a]:link">
            {!! Str::inlineMarkdown(config('portfolio.intro'), ['html_input' => 'strip']) !!}
        </p>

        <div class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-4">
            <x-button :href="route('contact.create')">Escríbeme</x-button>
            <x-social-links />
        </div>

        @if (config('portfolio.is_available_for_work'))
            <p class="mt-8 text-sm text-stone-500 dark:text-stone-400">
                Actualmente abierto a nuevas oportunidades.
            </p>
        @endif
    </section>

    {{-- Proyectos --}}
    <x-section id="proyectos" title="Proyectos">
        @if ($featuredProjects->isNotEmpty())
            <div class="divide-y divide-stone-200 dark:divide-stone-800">
                @foreach ($featuredProjects as $project)
                    <x-project-card :project="$project" />
                @endforeach
            </div>
        @else
            <p class="text-stone-500">Pronto publicaré mis proyectos aquí.</p>
        @endif

        <x-slot:action>
            <a href="{{ route('projects.index') }}" class="link">Ver todos los proyectos</a>
        </x-slot:action>
    </x-section>

    {{-- Experiencia --}}
    @if ($experiences->isNotEmpty())
        <x-section id="experiencia" title="Experiencia">
            <ol class="space-y-12">
                @foreach ($experiences as $experience)
                    <x-experience-item :experience="$experience" />
                @endforeach
            </ol>
        </x-section>
    @endif

    {{-- Sobre mí --}}
    <x-section id="sobre-mi" title="Sobre mí">
        <div class="max-w-prose space-y-4 text-[17px] leading-[1.75] text-pretty">
            @foreach (config('portfolio.about') as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach
        </div>
    </x-section>

    {{-- Habilidades --}}
    <x-section id="habilidades" title="Habilidades">
        <dl class="space-y-5">
            @foreach (config('portfolio.skills') as $category => $skills)
                <div class="grid gap-x-8 gap-y-1 sm:grid-cols-[8.5rem_1fr]">
                    <dt class="text-sm text-stone-500 sm:pt-0.5 dark:text-stone-400">{{ $category }}</dt>
                    <dd class="text-stone-900 dark:text-stone-100">{{ implode(', ', $skills) }}</dd>
                </div>
            @endforeach
        </dl>
    </x-section>

    {{-- Formación --}}
    <x-section id="formacion" title="Formación">
        <div class="grid gap-x-8 gap-y-1 sm:grid-cols-[8.5rem_1fr]">
            <p class="text-sm text-stone-500 sm:pt-0.5 dark:text-stone-400">{{ config('portfolio.education.completed') }}</p>
            <p class="font-medium text-stone-900 dark:text-stone-50">{{ config('portfolio.education.degree') }}</p>
        </div>
    </x-section>

    {{-- Blog --}}
    @if ($latestPosts->isNotEmpty())
        <x-section id="blog" title="Escritos">
            <div class="divide-y divide-stone-200 dark:divide-stone-800">
                @foreach ($latestPosts as $post)
                    <x-post-card :post="$post" />
                @endforeach
            </div>

            <x-slot:action>
                <a href="{{ route('posts.index') }}" class="link">Ver todos los artículos</a>
            </x-slot:action>
        </x-section>
    @endif

    {{-- Contacto --}}
    <x-section id="contacto" title="Contacto">
        <p class="max-w-2xl font-serif text-2xl leading-snug text-stone-900 sm:text-3xl dark:text-stone-50">
            ¿Tienes un proyecto o una vacante? Escríbeme a
            <a href="mailto:{{ config('portfolio.email') }}" class="link">{{ config('portfolio.email') }}</a>
            o usa el <a href="{{ route('contact.create') }}" class="link">formulario de contacto</a>.
        </p>
    </x-section>
</x-layouts.app>
