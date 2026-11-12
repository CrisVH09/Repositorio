@props([
    'title' => null,
    'description' => config('portfolio.tagline'),
])

@php
    $pageTitle = $title ? $title.' · '.config('portfolio.name') : config('portfolio.name').' — '.config('portfolio.role');
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-pt-24">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $pageTitle }}</title>
        <meta name="description" content="{{ $description }}">
        <link rel="canonical" href="{{ url()->current() }}">

        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $pageTitle }}">
        <meta property="og:description" content="{{ $description }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta name="twitter:card" content="summary_large_image">

        <script>
            (() => {
                let theme = null;
                try { theme = localStorage.getItem('theme'); } catch {}
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                if (theme === 'dark' || (theme === null && prefersDark)) {
                    document.documentElement.classList.add('dark');
                }
            })();
        </script>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-paper font-sans text-stone-700 antialiased dark:bg-stone-950 dark:text-stone-300">
        <a href="#contenido" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:rounded-md focus:bg-ink focus:px-4 focus:py-2 focus:text-paper">
            Saltar al contenido
        </a>

        <x-site-header />

        <main id="contenido" class="mx-auto w-full max-w-4xl px-6 pb-24">
            {{ $slot }}
        </main>

        <x-site-footer />
    </body>
</html>
