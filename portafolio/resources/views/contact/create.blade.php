<x-layouts.app title="Contacto" description="Escríbeme para hablar de un proyecto, una oportunidad laboral o una colaboración.">
    <div class="grid gap-12 pt-20 sm:pt-24 md:grid-cols-[1fr_1.1fr] md:gap-16">
        <div>
            <h1 class="font-serif text-4xl font-normal tracking-tight text-stone-900 sm:text-5xl dark:text-stone-50">Contacto</h1>
            <p class="mt-5 text-lg leading-relaxed text-pretty">
                Si tienes un proyecto, una vacante o una duda sobre algo que hice, escríbeme. Suelo responder en uno o dos días.
            </p>
            <p class="mt-6">
                También puedes escribirme directo a
                <a href="mailto:{{ config('portfolio.email') }}" class="link">{{ config('portfolio.email') }}</a>.
            </p>

            <x-social-links class="mt-8" />
        </div>

        <div>
            @session('status')
                <div role="status" class="mb-8 border-l-2 border-accent-500 pl-4 text-stone-900 dark:text-stone-100">
                    {{ $value }}
                </div>
            @endsession

            <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                @csrf

                {{-- Honeypot: hidden from humans, bots tend to fill it. --}}
                <div class="hidden" aria-hidden="true">
                    <label for="website">No completes este campo</label>
                    <input id="website" name="website" type="text" tabindex="-1" autocomplete="off">
                </div>

                <x-form.input name="name" label="Nombre" autocomplete="name" required />
                <x-form.input name="email" type="email" label="Correo electrónico" autocomplete="email" required />
                <x-form.input name="subject" label="Asunto (opcional)" />
                <x-form.textarea name="message" label="Mensaje" required />

                <x-button type="submit">Enviar mensaje</x-button>
            </form>
        </div>
    </div>
</x-layouts.app>
