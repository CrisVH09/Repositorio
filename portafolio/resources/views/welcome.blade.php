{{--
    Galería de componentes.

    Cada bloque muestra un componente funcionando y, debajo, el código Blade
    para usarlo. Los datos están escritos aquí mismo como ejemplo: en tu
    versión real vendrán de tus controladores o de config/portfolio.php.
--}}
<x-layouts.app
    title="Componentes"
    description="Galería de componentes Blade del portafolio."
    :nav-links="[
        ['label' => 'Básicos', 'href' => '#basicos', 'active' => true],
        ['label' => 'Contenido', 'href' => '#contenido-ejemplos'],
        ['label' => 'Formularios', 'href' => '#formularios'],
    ]"
>
    {{-- Introducción --}}
    <header class="pt-20 pb-14 sm:pt-24">
        <p class="text-sm text-stone-500 dark:text-stone-400">resources/views/components</p>
        <h1 class="mt-4 font-serif text-4xl font-normal tracking-tight text-stone-900 sm:text-5xl dark:text-stone-50">Componentes</h1>
        <p class="mt-5 max-w-2xl text-lg leading-relaxed text-pretty">
            Esta página está construida con <code class="font-mono text-[0.9em]">&lt;x-layouts.app&gt;</code>, que ya incluye
            <code class="font-mono text-[0.9em]">&lt;x-site-header&gt;</code> arriba y <code class="font-mono text-[0.9em]">&lt;x-site-footer&gt;</code> abajo.
            Debajo tienes cada componente con el código para usarlo.
        </p>
    </header>

    {{-- ===================================================== --}}
    {{-- Estructura                                             --}}
    {{-- ===================================================== --}}
    <x-section title="Estructura">
        <div class="space-y-12">
            <x-example title="x-layouts.app" description="Envuelve cada página. Recibe el título, la descripción para SEO y los enlaces del menú.">
                <p class="text-sm">Esta misma página es el ejemplo.</p>

                <x-slot:code>@verbatim
&lt;x-layouts.app
    title="Proyectos"
    description="Texto para buscadores y redes sociales."
    :nav-links="[
        ['label' =&gt; 'Proyectos', 'href' =&gt; '/proyectos', 'active' =&gt; true],
        ['label' =&gt; 'Contacto', 'href' =&gt; '/contacto'],
    ]"
&gt;
    ...contenido de la página...
&lt;/x-layouts.app&gt;
@endverbatim</x-slot:code>
            </x-example>

            <x-example title="x-section" description="Sección en dos columnas: el título a la izquierda y el contenido a la derecha. El slot action es opcional.">
                <x-section title="Mi sección" class="border-t-0 py-0">
                    <p>Aquí va el contenido de la sección.</p>

                    <x-slot:action>
                        <a href="#" class="link">Enlace opcional al final</a>
                    </x-slot:action>
                </x-section>

                <x-slot:code>@verbatim
&lt;x-section id="proyectos" title="Mi sección"&gt;
    &lt;p&gt;Aquí va el contenido de la sección.&lt;/p&gt;

    &lt;x-slot:action&gt;
        &lt;a href="/proyectos" class="link"&gt;Enlace opcional al final&lt;/a&gt;
    &lt;/x-slot:action&gt;
&lt;/x-section&gt;
@endverbatim</x-slot:code>
            </x-example>
        </div>
    </x-section>

    {{-- ===================================================== --}}
    {{-- Básicos                                                --}}
    {{-- ===================================================== --}}
    <x-section id="basicos" title="Básicos">
        <div class="space-y-12">
            <x-example title="x-button" description="Con href se convierte en enlace; sin href es un botón. Variantes: primary y secondary.">
                <div class="flex flex-wrap items-center gap-3">
                    <x-button href="#">Primario (enlace)</x-button>
                    <x-button href="#" variant="secondary">Secundario</x-button>
                    <x-button type="submit">Botón submit</x-button>
                    <x-button variant="secondary" disabled>Deshabilitado</x-button>
                    <x-button href="#">
                        <x-icon name="download" class="size-4" /> Con icono
                    </x-button>
                </div>

                <x-slot:code>@verbatim
&lt;x-button href="/contacto"&gt;Primario (enlace)&lt;/x-button&gt;
&lt;x-button href="/proyectos" variant="secondary"&gt;Secundario&lt;/x-button&gt;
&lt;x-button type="submit"&gt;Botón submit&lt;/x-button&gt;
&lt;x-button variant="secondary" disabled&gt;Deshabilitado&lt;/x-button&gt;

&lt;x-button href="/cv.pdf"&gt;
    &lt;x-icon name="download" class="size-4" /&gt; Con icono
&lt;/x-button&gt;
@endverbatim</x-slot:code>
            </x-example>

            <x-example title="Clase link" description="No es un componente, es una utilidad de CSS para enlaces dentro de un texto.">
                <p>Puedes ver el <a href="#" class="link">código en GitHub</a> o escribirme por correo.</p>

                <x-slot:code>@verbatim
&lt;a href="https://github.com/..." class="link"&gt;código en GitHub&lt;/a&gt;
@endverbatim</x-slot:code>
            </x-example>

            <x-example title="x-nav-link" description="Enlace del menú. Con la prop active en true se subraya como la página actual.">
                <div class="flex gap-6">
                    <x-nav-link href="#" :active="true">Activo</x-nav-link>
                    <x-nav-link href="#">Inactivo</x-nav-link>
                </div>

                <x-slot:code>@verbatim
&lt;x-nav-link href="/proyectos" :active="request()-&gt;is('proyectos')"&gt;Activo&lt;/x-nav-link&gt;
&lt;x-nav-link href="/blog"&gt;Inactivo&lt;/x-nav-link&gt;
@endverbatim</x-slot:code>
            </x-example>

            <x-example title="x-tech-badge" description="Etiqueta pequeña para tecnologías o categorías.">
                <div class="flex flex-wrap gap-2">
                    @foreach (['Laravel', 'PHP', 'MySQL', 'Leaflet'] as $technology)
                        <x-tech-badge>{{ $technology }}</x-tech-badge>
                    @endforeach
                </div>

                <x-slot:code>@verbatim
@foreach (['Laravel', 'PHP', 'MySQL'] as $technology)
    &lt;x-tech-badge&gt;{{ $technology }}&lt;/x-tech-badge&gt;
@endforeach
@endverbatim</x-slot:code>
            </x-example>

            <x-example title="x-icon" description="Iconos SVG en línea. El tamaño y el color se controlan con clases; para agregar uno nuevo, añade un @case en icon.blade.php.">
                <ul class="flex flex-wrap gap-6 text-stone-700 dark:text-stone-300">
                    @foreach (['github', 'linkedin', 'mail', 'sun', 'moon', 'menu', 'arrow-up-right', 'arrow-left', 'map-pin', 'download'] as $iconName)
                        <li class="flex flex-col items-center gap-2">
                            <x-icon :name="$iconName" class="size-6" />
                            <span class="font-mono text-xs text-stone-500">{{ $iconName }}</span>
                        </li>
                    @endforeach
                </ul>

                <x-slot:code>@verbatim
&lt;x-icon name="github" class="size-6" /&gt;
&lt;x-icon name="mail" class="size-4 text-stone-500" /&gt;
@endverbatim</x-slot:code>
            </x-example>

            <x-example title="x-social-links" description="Toma tus redes y tu correo de config/portfolio.php (claves socials y email).">
                <x-social-links />

                <x-slot:code>@verbatim
&lt;x-social-links /&gt;
&lt;x-social-links class="mt-8 justify-center" /&gt;
@endverbatim</x-slot:code>
            </x-example>
        </div>
    </x-section>

    {{-- ===================================================== --}}
    {{-- Contenido                                              --}}
    {{-- ===================================================== --}}
    <x-section id="contenido-ejemplos" title="Contenido">
        <div class="space-y-12">
            <x-example title="x-project-card" description="Un proyecto como fila de lista. Envuelve varios en un div con divide-y para separarlos con líneas.">
                <div class="divide-y divide-stone-200 dark:divide-stone-800">
                    <x-project-card
                        title="Sistema de Agenda Médica"
                        href="#"
                        summary="Sistema integral para la administración y programación de citas en unidades de salud."
                        :stack="['Laravel', 'PHP', 'MySQL', 'JavaScript']"
                        impact="+5,000 citas registradas"
                        year="2025"
                    />
                    <x-project-card
                        title="Mapa de Geolocalización de Unidades Médicas"
                        href="#"
                        summary="Plataforma web para visualizar y consultar las unidades médicas del estado de Hidalgo."
                        :stack="['JavaScript', 'Leaflet', 'OpenStreetMap', 'GeoJSON']"
                        year="2025"
                    />
                </div>

                <x-slot:code>@verbatim
&lt;div class="divide-y divide-stone-200 dark:divide-stone-800"&gt;
    &lt;x-project-card
        title="Sistema de Agenda Médica"
        href="/proyectos/sistema-de-agenda-medica"
        summary="Sistema integral para la administración..."
        :stack="['Laravel', 'PHP', 'MySQL']"
        impact="+5,000 citas registradas"
        year="2025"
    /&gt;
&lt;/div&gt;

{{-- Con datos de un arreglo o de un modelo: --}}
@foreach ($projects as $project)
    &lt;x-project-card
        :title="$project['title']"
        :href="$project['url']"
        :summary="$project['summary']"
        :stack="$project['stack']"
    /&gt;
@endforeach
@endverbatim</x-slot:code>
            </x-example>

            <x-example title="x-experience-item" description="Un puesto de trabajo. Cada uno es un elemento li, así que van dentro de una lista ol.">
                <ol class="space-y-12">
                    <x-experience-item
                        period="jul 2025 – hoy"
                        role="Desarrollador de Software"
                        company="IMSS-BIENESTAR"
                        description="Desarrollo y mantenimiento de soluciones tecnológicas institucionales."
                        :highlights="[
                            'Más de 5,000 citas médicas registradas en tres unidades de salud.',
                            'Módulo de gestión de guardias médicas.',
                        ]"
                        :stack="['Laravel', 'PHP', 'JavaScript', 'MySQL']"
                    />
                    <x-experience-item
                        period="ene 2025 – abr 2025"
                        role="Practicante de Desarrollo de Software"
                        company="IMSS-BIENESTAR"
                    />
                </ol>

                <x-slot:code>@verbatim
&lt;ol class="space-y-12"&gt;
    &lt;x-experience-item
        period="jul 2025 – hoy"
        role="Desarrollador de Software"
        company="IMSS-BIENESTAR"
        company-url="https://..."
        description="Desarrollo y mantenimiento de..."
        :highlights="['Logro uno.', 'Logro dos.']"
        :stack="['Laravel', 'PHP']"
    /&gt;
&lt;/ol&gt;
@endverbatim</x-slot:code>
            </x-example>

            <x-example title="x-post-card" description="Un artículo del blog como fila de lista.">
                <div class="divide-y divide-stone-200 dark:divide-stone-800">
                    <x-post-card
                        title="Cómo dibujé 300 unidades médicas con Leaflet"
                        href="#"
                        date="12 nov 2026"
                        excerpt="Lo que aprendí al cargar y filtrar datos GeoJSON en un mapa interactivo."
                        :reading-time="6"
                    />
                    <x-post-card
                        title="Validar disponibilidad de citas en Laravel"
                        href="#"
                        date="3 oct 2026"
                        :reading-time="4"
                    />
                </div>

                <x-slot:code>@verbatim
&lt;x-post-card
    title="Cómo dibujé 300 unidades médicas con Leaflet"
    href="/blog/leaflet-unidades-medicas"
    date="12 nov 2026"
    excerpt="Lo que aprendí al cargar datos GeoJSON..."
    :reading-time="6"
/&gt;
@endverbatim</x-slot:code>
            </x-example>
        </div>
    </x-section>

    {{-- ===================================================== --}}
    {{-- Formularios                                            --}}
    {{-- ===================================================== --}}
    <x-section id="formularios" title="Formularios">
        <x-example title="x-form.input y x-form.textarea" description="Muestran la etiqueta, recuerdan el valor anterior con old() y pintan el error de validación del campo automáticamente.">
            <form action="#" class="max-w-md space-y-6" onsubmit="event.preventDefault()">
                <x-form.input name="name" label="Nombre" placeholder="Tu nombre" />
                <x-form.input name="email" type="email" label="Correo electrónico" placeholder="tu@correo.com" />
                <x-form.textarea name="message" label="Mensaje" rows="4" placeholder="Cuéntame sobre tu proyecto" />

                <x-button type="submit">Enviar mensaje</x-button>
            </form>

            <x-slot:code>@verbatim
&lt;form method="POST" action="/contacto" class="space-y-6"&gt;
    @csrf

    &lt;x-form.input name="name" label="Nombre" required /&gt;
    &lt;x-form.input name="email" type="email" label="Correo electrónico" required /&gt;
    &lt;x-form.textarea name="message" label="Mensaje" rows="4" required /&gt;

    &lt;x-button type="submit"&gt;Enviar mensaje&lt;/x-button&gt;
&lt;/form&gt;
@endverbatim</x-slot:code>
        </x-example>
    </x-section>
</x-layouts.app>
