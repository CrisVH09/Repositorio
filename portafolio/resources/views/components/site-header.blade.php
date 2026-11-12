@php
    $links = [
        ['label' => 'Proyectos', 'route' => 'projects.index', 'pattern' => 'projects.*'],
        ['label' => 'Blog', 'route' => 'posts.index', 'pattern' => 'posts.*'],
        ['label' => 'Contacto', 'route' => 'contact.create', 'pattern' => 'contact.*'],
    ];
@endphp

<header class="mx-auto max-w-4xl px-6">
    <nav class="flex h-20 items-center justify-between border-b border-stone-200 dark:border-stone-800" aria-label="Principal">
        <a href="{{ route('home') }}" class="font-serif text-xl font-medium text-stone-900 dark:text-stone-50">
            {{ config('portfolio.name') }}
        </a>

        <div class="flex items-center gap-6">
            <ul class="hidden items-center gap-6 sm:flex">
                @foreach ($links as $link)
                    <li>
                        <x-nav-link :href="route($link['route'])" :active="request()->routeIs($link['pattern'])">
                            {{ $link['label'] }}
                        </x-nav-link>
                    </li>
                @endforeach
            </ul>

            <button type="button" data-theme-toggle class="-mr-2 p-2 text-stone-500 transition hover:text-stone-900 dark:text-stone-400 dark:hover:text-stone-50" aria-label="Cambiar tema claro u oscuro">
                <x-icon name="moon" class="size-[18px] dark:hidden" />
                <x-icon name="sun" class="hidden size-[18px] dark:block" />
            </button>

            <button type="button" data-menu-toggle aria-expanded="false" aria-controls="menu-movil" class="-mr-2 p-2 text-stone-600 sm:hidden dark:text-stone-400" aria-label="Abrir menú">
                <x-icon name="menu" class="size-5" />
            </button>
        </div>
    </nav>

    <ul id="menu-movil" data-menu class="hidden space-y-3 border-b border-stone-200 py-4 sm:hidden dark:border-stone-800">
        @foreach ($links as $link)
            <li>
                <x-nav-link :href="route($link['route'])" :active="request()->routeIs($link['pattern'])">
                    {{ $link['label'] }}
                </x-nav-link>
            </li>
        @endforeach
    </ul>
</header>
