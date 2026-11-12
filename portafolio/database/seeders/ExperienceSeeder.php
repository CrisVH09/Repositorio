<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Seed the professional experience. Safe to run more than once.
     */
    public function run(): void
    {
        Experience::updateOrCreate(
            ['role' => 'Desarrollador de Software', 'company' => 'IMSS-BIENESTAR'],
            [
                'location' => 'Hidalgo, México',
                'description' => 'Desarrollo, mantenimiento y optimización de soluciones tecnológicas institucionales para los servicios de salud.',
                'highlights' => [
                    'Desarrollo del Sistema de Agenda Médica: pacientes, médicos, consultorios, especialidades, horarios y seguimiento de citas.',
                    'Más de 5,000 citas médicas registradas en tres unidades de salud: UEPAVFS, UNEME EC Pachuca y CESAGI.',
                    'Implementación de controles de acceso, validaciones de disponibilidad, reportes estadísticos y dashboards.',
                    'Módulo de gestión de guardias médicas.',
                    'Evolución del Mapa de Geolocalización con filtros geográficos y procesamiento de información territorial.',
                ],
                'tech_stack' => ['Laravel', 'PHP', 'JavaScript', 'MySQL', 'Leaflet'],
                'started_at' => '2025-07-01',
                'ended_at' => null,
            ],
        );

        Experience::updateOrCreate(
            ['role' => 'Practicante de Desarrollo de Software', 'company' => 'IMSS-BIENESTAR'],
            [
                'location' => 'Hidalgo, México',
                'description' => 'Prácticas profesionales en el desarrollo del Mapa de Geolocalización de Unidades Médicas del estado de Hidalgo.',
                'highlights' => [
                    'Participación en el desarrollo de una plataforma web para visualizar, localizar y consultar información geográfica de las unidades médicas.',
                ],
                'tech_stack' => ['JavaScript', 'Leaflet', 'OpenStreetMap', 'GeoJSON'],
                'started_at' => '2025-01-01',
                'ended_at' => '2025-04-30',
            ],
        );
    }
}
