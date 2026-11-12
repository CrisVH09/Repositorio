<ul {{ $attributes->merge(['class' => 'flex flex-wrap items-center gap-x-5 gap-y-2 text-sm']) }}>
    @foreach (config('portfolio.socials') as $social)
        <li>
            <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" class="text-stone-500 transition-colors hover:text-stone-900 dark:text-stone-400 dark:hover:text-stone-50">
                {{ $social['label'] }}<span class="sr-only"> (se abre en otra pestaña)</span>
            </a>
        </li>
    @endforeach

    <li>
        <a href="mailto:{{ config('portfolio.email') }}" class="text-stone-500 transition-colors hover:text-stone-900 dark:text-stone-400 dark:hover:text-stone-50">
            Correo
        </a>
    </li>

    @if (config('portfolio.resume_url'))
        <li>
            <a href="{{ config('portfolio.resume_url') }}" target="_blank" rel="noopener" class="text-stone-500 transition-colors hover:text-stone-900 dark:text-stone-400 dark:hover:text-stone-50">
                CV (PDF)
            </a>
        </li>
    @endif
</ul>
