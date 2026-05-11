<?php

namespace Database\Seeders;

use App\Models\Metadata;
use Illuminate\Database\Seeder;

class MetadataSeeder extends Seeder
{
    public function run(): void
    {
        Metadata::updateOrCreate(
        ['id' => 1],
        [
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
                'pt' => 'controle de convencionalidade, Corte IDH, direitos humanos e laicidade, epistemologia jurídica, filosofia do direito UFPR, políticas públicas e acesso à informação, ética e pesquisa jurídica',
                'en' => 'conventionality control, human rights, international law research, legal philosophy and epistemology, public policies and ethics, UFPR legal research, access to information law',
                'fr' => 'contrôle de conventionnalité, droits de l\'homme, recherche juridique Brésil France, philosophie du droit et épistémologie, laïcité et politiques publiques, éthique et droit',
                'es' => 'control de convencionalidad, sistema interamericano, derechos humanos y laicidad, filosofía del derecho y epistemología, investigación jurídica UFPR, políticas públicas y acceso a la información, ética legal'
            ],
            'theme_color' => '#0090d9',
            'robots' => 'index, follow',
            'social_metadata' => [
                'pt' => [
                    'og:url' => 'https://matiz.me/pt',
                    'og:site_name' => 'Matiz Madel - Currículo Acadêmico',
                    'og:title' => 'Portfólio Acadêmico | Direito Constitucional e Direitos Humanos',
                    'og:description' => 'Portfólio acadêmico de Matiz Madel. Pesquisas focadas em direito constitucional, filosofia do direito e epistemologia.',
                    'og:type' => 'profile',
                    'twitter:card' => 'summary_large_image',
                    'twitter:site' => '@matiz_madel',
                    'twitter:creator' => '@matiz_madel',
                    'twitter:title' => 'Matiz Madel - Direitos Humanos e Filosofia do Direito',
                    'profile:first_name' => 'Matiz',
                    'profile:last_name' => 'Madel'
                ],
                'en' => [
                    'og:url' => 'https://matiz.me/en',
                    'og:site_name' => 'Matiz Madel - Academic Portfolio',
                    'og:title' => 'Academic Portfolio - Constitutional Law and Human Rights',
                    'og:description' => 'Academic portfolio of Matiz Madel. Research focused on constitutional law, philosophy of law, and epistemology.',
                    'og:type' => 'profile',
                    'twitter:card' => 'summary_large_image',
                    'twitter:site' => '@matiz_madel',
                    'twitter:creator' => '@matiz_madel',
                    'twitter:title' => 'Matiz Madel - Human Rights and Philosophy of Law',
                    'profile:first_name' => 'Matiz',
                    'profile:last_name' => 'Madel'
                ],
                'fr' => [
                    'og:url' => 'https://matiz.me/fr',
                    'og:site_name' => 'Matiz Madel - Curriculum Vitae Académique',
                    'og:title' => 'Portfolio Académique | Droit Constitutionnel et Droits Humains',
                    'og:description' => 'Portfolio académique de Matiz Madel. Recherches axées sur le droit constitutionnel, la philosophie du droit et l\'épistémologie.',
                    'og:type' => 'profile',
                    'twitter:card' => 'summary_large_image',
                    'twitter:site' => '@matiz_madel',
                    'twitter:creator' => '@matiz_madel',
                    'twitter:title' => 'Matiz Madel - Droits Humains et Philosophie du Droit',
                    'profile:first_name' => 'Matiz',
                    'profile:last_name' => 'Madel'
                ],
                'es' => [
                    'og:url' => 'https://matiz.me/es',
                    'og:site_name' => 'Matiz Madel - Portafolio Académico',
                    'og:title' => 'Portafolio Académico - Derecho Constitucional y Derechos Humanos',
                    'og:description' => 'Portafolio académico de Matiz Madel. Investigaciones centradas en derecho constitucional, filosofía del derecho y epistemología.',
                    'og:type' => 'profile',
                    'twitter:card' => 'summary_large_image',
                    'twitter:site' => '@matiz_madel',
                    'twitter:creator' => '@matiz_madel',
                    'twitter:title' => 'Matiz Madel - Derechos Humanos y Filosofía del Derecho',
                    'profile:first_name' => 'Matiz',
                    'profile:last_name' => 'Madel'
                ],
            ],

            'academic_metadata' => [
                'pt' => [
                    'birthDate' => '1998-11-07',
                    'research_gate' => 'https://www.researchgate.net/profile/Matiz-Madel',
                    'google_scholar' => 'https://scholar.google.com/citations?user=6J1fQGkAAAAJ',
                    'knows_about' => 'Direito Internacional Público, Direitos Humanos, Direito Constitucional, Filosofia do Direito, Pesquisa Jurídica, Desenvolvimento de Software, Desenvolvimento Web, Direito e Tecnologia, Legal Tech, Pesquisa Acadêmica, Jurimetria, Desenvolvimento Full-Stack, Engenharia de Software.',
                    'affiliation_current' => 'Universidade Federal do Paraná (UFPR)'
                ],
                'en' => [
                    'birthDate' => '1998-11-07',
                    'research_gate' => 'https://www.researchgate.net/profile/Matiz-Madel',
                    'google_scholar' => 'https://scholar.google.com/citations?user=6J1fQGkAAAAJ',
                    'knows_about' => 'Public International Law, Human Rights Law, Constitutional Law, Philosophy of Law, Legal Research, Software Development, Web Development, Law and Technology, Legal Tech, Academic Research, Jurimetrics, Full-Stack Development, Software Engineering.',
                    'affiliation_current' => 'Universidade Federal do Paraná (UFPR)'
                ],
                'fr' => [
                    'birthDate' => '1998-11-07',
                    'research_gate' => 'https://www.researchgate.net/profile/Matiz-Madel',
                    'google_scholar' => 'https://scholar.google.com/citations?user=6J1fQGkAAAAJ',
                    'knows_about' => 'Droit International Public, Droits Humains, Droit Constitutionnel, Philosophie du Droit, Recherche Juridique, Développement Logiciel, Développement Web, Droit et Technologie, Legal Tech, Recherche Académique, Jurimétrie, Développement Full-Stack, Ingénierie Logicielle.',
                    'affiliation_current' => 'Université Fédéral du Paraná (UFPR)'
                ],
                'es' => [
                    'birthDate' => '1998-11-07',
                    'research_gate' => 'https://www.researchgate.net/profile/Matiz-Madel',
                    'google_scholar' => 'https://scholar.google.com/citations?user=6J1fQGkAAAAJ',
                    'knows_about' => 'Derecho Internacional Público, Derechos Humanos, Derecho Constitucional, Filosofía del Derecho, Investigación Jurídica, Desarrollo de Software, Desarrollo Web, Derecho y Tecnología, Legal Tech, Investigación Académica, Jurimetría, Desarrollo Full-Stack, Ingeniería de Software.',
                    'affiliation_current' => 'Universidade Federal do Paraná (UFPR)'
                ],
            ]
        ]);
    }
}




