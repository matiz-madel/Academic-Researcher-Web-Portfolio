<?php

namespace Database\Seeders;

use App\Models\Metadata;
use Illuminate\Database\Seeder;

class MetadataSeeder extends Seeder
{
    public function run(): void
    {
        Metadata::updateOrCreate(['id' => 1], [
            'title_suffix' => [
                'pt' => 'Currículo Acadêmico',
                'en' => 'Academic Portfolio',
                'fr' => 'Curriculum Vitae Académique',
                'es' => 'Portafolio Académico',
            ],
            'description' => [
                'pt' => 'Portfólio acadêmico de Matiz Madel. Pesquisadora em Direito (UFPR) e Desenvolvedora.',
                'en' => 'Academic portfolio of Matiz Madel. Law Researcher (UFPR) and Developer.',
                'fr' => 'Portfolio académique de Matiz Madel. Chercheuse en Droit (UFPR) et Développeuse.',
                'es' => 'Portafolio académico de Matiz Madel. Investigadora en Derecho (UFPR) y Desarrolladora.'
            ],
            'keywords' => [
                'pt' => 'direito, laravel, php, ufpr, laicidade, direitos humanos, desenvolvimento web, matiz madel',
                'en' => 'law, laravel, php, researcher, software engineering, secularism, human rights',
                'fr' => 'droit, laravel, laïcité, droits de l\'homme, génie logiciel, chercheuse',
                'es' => 'derecho, laravel, laicidad, derechos humanos, ingeniería de software, investigadora'
            ],
            'theme_color' => '#0f172a',
            'robots' => 'index, follow',

            'social_metadata' => [
                'pt' => [
                    'og:site_name' => 'Matiz Madel - Currículo Acadêmico',
                    'og:type' => 'profile',
                    'twitter:card' => 'summary_large_image',
                    'twitter:site' => '@matizmadel',
                    'twitter:creator' => '@matizmadel'
                ],
                'en' => [
                    'og:site_name' => 'Matiz Madel - Academic Portfolio',
                    'og:type' => 'profile',
                    'twitter:card' => 'summary_large_image',
                    'twitter:site' => '@matizmadel',
                    'twitter:creator' => '@matizmadel'
                ],
                'fr' => [
                    'og:site_name' => 'Matiz Madel - Curriculum Vitae Académique',
                    'og:type' => 'profile',
                    'twitter:card' => 'summary_large_image',
                    'twitter:site' => '@matiz_madel',
                    'twitter:creator' => '@matiz_madel'
                ],
                'es' => [
                    'og:site_name' => 'Matiz Madel - Portafolio Académico',
                    'og:type' => 'profile',
                    'twitter:card' => 'summary_large_image',
                    'twitter:site' => '@matiz_madel',
                    'twitter:creator' => '@matiz_madel'
                ],
            ],

            'academic_metadata' => [
                'pt' => [
                    'research_gate' => 'https://www.researchgate.net/profile/Matiz-Madel',
                    'google_scholar' => 'https://scholar.google.com/',
                    'knows_about' => 'Direito Internacional, Controle de Convencionalidade, Desenvolvimento'
                ],
                'en' => [
                    'research_gate' => 'https://www.researchgate.net/profile/Matiz-Madel',
                    'google_scholar' => 'https://scholar.google.com/',
                    'knows_about' => 'International Law, Conventionality Control, Development'
                ],
                'fr' => [
                    'research_gate' => 'https://www.researchgate.net/profile/Matiz-Madel',
                    'google_scholar' => 'https://scholar.google.com/',
                    'knows_about' => 'Droit International, Contrôle de Conventionnalité, Développement'
                ],
                'es' => [
                    'research_gate' => 'https://www.researchgate.net/profile/Matiz-Madel',
                    'google_scholar' => 'https://scholar.google.com/',
                    'knows_about' => 'Derecho Internacional, Control de Convencionalidad, Desarrollo'
                ],
            ]
        ]);
    }
}
