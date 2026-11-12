<?php

/*
|--------------------------------------------------------------------------
| Portfolio Profile
|--------------------------------------------------------------------------
|
| Personal information displayed across the portfolio. Edit these values
| to customize the hero, the "about" section, the skills and the social
| links without touching the Blade templates.
|
*/

return [

    'name' => env('PORTFOLIO_NAME', 'Cristian Valeriano'),

    'role' => env('PORTFOLIO_ROLE', 'Desarrollador de Software'),

    'tagline' => 'Desarrollo sistemas web institucionales para el sector salud con Laravel, PHP y JavaScript.',

    'about' => [
        'Desde enero de 2025 he desarrollado mi trayectoria profesional en IMSS-BIENESTAR, comenzando como practicante y posteriormente incorporándome formalmente como Desarrollador de Software en julio del mismo año.',
        'Mi experiencia se ha centrado en dos proyectos institucionales: el Mapa de Geolocalización de Unidades Médicas y el Sistema de Agenda Médica, participando en su desarrollo, mantenimiento y mejora continua para optimizar procesos administrativos y fortalecer las herramientas tecnológicas de los servicios de salud.',
    ],

    'education' => [
        'degree' => 'Ingeniería en Desarrollo y Gestión de Software',
        'completed' => 'Agosto 2025',
    ],

    'location' => env('PORTFOLIO_LOCATION', 'Hidalgo, México'),

    'email' => env('PORTFOLIO_EMAIL', 'danivh999@gmail.com'),

    'resume_url' => env('PORTFOLIO_RESUME_URL'),

    'is_available_for_work' => (bool) env('PORTFOLIO_AVAILABLE', true),

    /*
    | Hero copy. "intro" accepts inline Markdown, so you can add links.
    */
    'headline' => 'Desarrollo software para la salud pública en Hidalgo.',

    'intro' => 'Soy Cristian. Trabajo en IMSS-BIENESTAR, donde desarrollo el [Sistema de Agenda Médica](/proyectos/sistema-de-agenda-medica), que ya registró más de 5,000 citas en tres unidades de salud, y el [Mapa de Geolocalización de Unidades Médicas](/proyectos/mapa-de-geolocalizacion-de-unidades-medicas) del estado.',

    /*
    | Skills grouped by category. Each group renders as a list of badges.
    */
    'skills' => [
        'Backend' => ['PHP', 'Laravel', 'MySQL', 'Control de acceso', 'Administración de sistemas'],
        'Frontend' => ['JavaScript', 'HTML', 'CSS', 'Blade', 'Dashboards interactivos'],
        'Mapas y datos' => ['Leaflet', 'OpenStreetMap', 'GeoJSON', 'Reportes estadísticos'],
    ],

    /*
    | Social profiles. The "icon" must match a name in the x-icon component.
    */
    'socials' => [
        ['label' => 'GitHub', 'url' => 'https://github.com/CrisVH09', 'icon' => 'github'],
        ['label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/', 'icon' => 'linkedin'],
    ],

];
