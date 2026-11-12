<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Seed the portfolio projects. Safe to run more than once.
     */
    public function run(): void
    {
        Project::updateOrCreate(['slug' => 'sistema-de-agenda-medica'], [
            'title' => 'Sistema de Agenda Médica',
            'summary' => 'Sistema integral para la administración y programación de citas en unidades de salud de IMSS-BIENESTAR.',
            'impact' => '+5,000 citas registradas',
            'body' => <<<'MARKDOWN'
                ## El reto

                Las unidades de salud necesitaban digitalizar y organizar la programación de citas médicas, coordinando pacientes, médicos, consultorios, especialidades y horarios.

                ## Mi participación

                Participé en el desarrollo y la evolución del sistema, incorporando:

                - Administración de pacientes, médicos, consultorios y especialidades.
                - Gestión de horarios, programación y seguimiento de citas.
                - Controles de acceso y validaciones de disponibilidad.
                - Reportes estadísticos y dashboards interactivos.
                - Módulo de gestión de guardias médicas.

                ## Resultados

                Entre agosto y octubre de 2026 el sistema registró **más de 5,000 citas médicas** en tres unidades de salud: **UEPAVFS**, **UNEME EC Pachuca** y **CESAGI**, contribuyendo a la digitalización y organización de los procesos de atención médica.
                MARKDOWN,
            'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'JavaScript'],
            'repository_url' => null,
            'demo_url' => null,
            'is_featured' => true,
            'sort_order' => 1,
            'published_at' => '2025-07-01',
        ]);

        Project::updateOrCreate(['slug' => 'mapa-de-geolocalizacion-de-unidades-medicas'], [
            'title' => 'Mapa de Geolocalización de Unidades Médicas',
            'summary' => 'Plataforma web para visualizar, localizar y consultar información geográfica de las unidades médicas del estado de Hidalgo.',
            'impact' => 'Cobertura estatal · Hidalgo',
            'body' => <<<'MARKDOWN'
                ## El reto

                Consultar la ubicación y la información de las unidades médicas del estado de Hidalgo de forma rápida y visual.

                ## Mi participación

                Comencé en este proyecto durante mis prácticas profesionales (enero – abril 2025) y continué su desarrollo como Desarrollador de Software a partir de julio de 2025:

                - Funcionalidades de consulta y filtros geográficos.
                - Visualización interactiva de unidades médicas sobre el mapa.
                - Procesamiento de información territorial con GeoJSON.
                - Mantenimiento y optimización continua de la plataforma.
                MARKDOWN,
            'tech_stack' => ['JavaScript', 'Leaflet', 'OpenStreetMap', 'GeoJSON'],
            'repository_url' => null,
            'demo_url' => null,
            'is_featured' => true,
            'sort_order' => 2,
            'published_at' => '2025-01-01',
        ]);

        Project::updateOrCreate(['slug' => 'portafolio-personal'], [
            'title' => 'Portafolio Personal',
            'summary' => 'Este mismo sitio: un portafolio construido con Laravel, Blade y Tailwind CSS, con blog en Markdown y formulario de contacto.',
            'impact' => null,
            'body' => <<<'MARKDOWN'
                ## El objetivo

                Tener un lugar para mostrar mi trabajo que también demuestre mis habilidades técnicas.

                ## La solución

                Un sitio en Laravel con contenido gestionado desde la base de datos, componentes Blade reutilizables, modo oscuro y pruebas automatizadas en todas las rutas públicas.
                MARKDOWN,
            'tech_stack' => ['Laravel', 'Blade', 'Tailwind CSS', 'PHPUnit'],
            'repository_url' => 'https://github.com/CrisVH09',
            'demo_url' => null,
            'is_featured' => true,
            'sort_order' => 3,
            'published_at' => '2026-11-12',
        ]);
    }
}
