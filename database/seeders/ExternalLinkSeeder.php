<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExternalLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $external_links = [
            [
                'id' => 1,
                'label' => '{"en": "ORCID", "es": "ORCID", "fr": "ORCID", "pt": "ORCID"}',
                'url' => '{"en": "https://orcid.org/0009-0004-1775-8747", "es": "https://orcid.org/0009-0004-1775-8747", "fr": "https://orcid.org/0009-0004-1775-8747", "pt": "https://orcid.org/0009-0004-1775-8747"}',
                'color' => '#A6CE39',
                'sort' => 1,
                'description' => '{"en": "Researcher identifier and academic publications", "es": "Identificador de investigador y publicaciones académicas", "fr": "Identifiant de chercheur et publications académiques", "pt": "Identificador de pesquisador e publicações acadêmicas"}',
                'created_at' => '2026-05-04 00:36:40',
                'updated_at' => '2026-05-06 13:49:39'
            ],
            [
                'id' => 2,
                'label' => '{"en": "Lattes", "es": "Lattes", "fr": "Lattes", "pt": "Lattes"}',
                'url' => '{"en": "http://lattes.cnpq.br/0067154300029140", "es": "http://lattes.cnpq.br/0067154300029140", "fr": "http://lattes.cnpq.br/0067154300029140", "pt": "http://lattes.cnpq.br/0067154300029140"}',
                'color' => '#003366',
                'sort' => 2,
                'description' => '{"en": "Official Brazilian academic profile (CNPq)", "es": "Perfil académico oficial del gobierno brasileño (CNPq)", "fr": "Profil académique officiel du gouvernement brésilien (CNPq)", "pt": "Perfil acadêmico oficial brasileiro (Plataforma Lattes/CNPq)"}',
                'created_at' => '2026-05-04 01:02:09',
                'updated_at' => '2026-05-06 13:49:39'
            ],
            [
                'id' => 3,
                'label' => '{"en": "Instagram", "es": "Instagram", "fr": "Instagram", "pt": "Instagram"}',
                'url' => '{"en": "https://instagram.com/matiz.madel", "es": "https://instagram.com/matiz.madel", "fr": "https://instagram.com/matiz.madel", "pt": "https://instagram.com/matiz.madel"}',
                'color' => '#E1306C',
                'sort' => 6,
                'description' => '{"en": "Social Media Profile", "es": "Perfil de red social", "fr": "Profil de réseau social", "pt": "Perfil de rede social"}',
                'created_at' => '2026-05-04 01:04:28',
                'updated_at' => '2026-05-06 13:49:39'
            ],
            [
                'id' => 4,
                'label' => '{"en": "LinkedIn", "es": "LinkedIn", "fr": "LinkedIn", "pt": "LinkedIn"}',
                'url' => '{"en": "https://www.linkedin.com/in/matiz-madel/", "es": "https://www.linkedin.com/in/matiz-madel/", "fr": "https://www.linkedin.com/in/matiz-madel/", "pt": "https://linkedin.com/in/matiz-madel"}',
                'color' => '#0A66C2',
                'sort' => 3,
                'description' => '{"en": "Professional profile and networking", "es": "Perfil profesional y red de contactos", "fr": "Profil professionnel et réseau", "pt": "Perfil profissional e networking"}',
                'created_at' => '2026-05-04 14:39:44',
                'updated_at' => '2026-05-06 13:49:39'
            ],
            [
                'id' => 5,
                'label' => '{"en": "X (Twitter)", "es": "X (Twitter)", "fr": "X (Twitter)", "pt": "X (Twitter)"}',
                'url' => '{"en": "https://x.com/matiz_madel", "es": "https://x.com/matiz_madel", "fr": "https://x.com/matiz_madel", "pt": "https://x.com/matiz_madel"}',
                'color' => '#000000',
                'sort' => 7,
                'description' => '{"en": "Social Media Profile", "es": "Perfil de red social", "fr": "Profil de réseau social", "pt": "Perfil de rede social"}',
                'created_at' => '2026-05-04 14:40:37',
                'updated_at' => '2026-05-06 13:49:39'
            ],
            [
                'id' => 6,
                'label' => '{"en": "Facebook", "es": "Facebook", "fr": "Facebook", "pt": "Facebook"}',
                'url' => '{"en": "https://facebook.com/matiz.madel", "es": "https://facebook.com/matiz.madel", "fr": "https://facebook.com/matiz.madel", "pt": "https://facebook.com/matiz.madel"}',
                'color' => '#1877F2',
                'sort' => 8,
                'description' => '{"en": "Social Media Profile", "es": "Perfil de red social", "fr": "Profil de réseau social", "pt": "Perfil de rede social"}',
                'created_at' => '2026-05-04 14:42:49',
                'updated_at' => '2026-05-06 13:49:39'
            ],
            [
                'id' => 7,
                'label' => '{"en": "GitHub", "es": "GitHub", "fr": "GitHub", "pt": "GitHub"}',
                'url' => '{"en": "https://github.com/matiz-madel", "es": "https://github.com/matiz-madel", "fr": "https://github.com/matiz-madel", "pt": "https://github.com/matiz-madel"}',
                'color' => '#181717',
                'sort' => 5,
                'description' => '{"en": "Explore my projects and source code on GitHub", "es": "Explora mis proyectos y códigos fuente en GitHub", "fr": "Découvrez mes projets et codes sources sur GitHub", "pt": "Explore meus projetos e códigos-fonte no GitHub"}',
                'created_at' => '2026-05-04 17:59:40',
                'updated_at' => '2026-05-06 13:49:39'
            ],
            [
                'id' => 8,
                'label' => '{"en": "Duolingo", "es": "Duolingo", "fr": "Duolingo", "pt": "Duolingo"}',
                'url' => '{"en": "https://duolingo.com/profile/matiz.madel", "es": "https://duolingo.com/profile/matiz.madel", "fr": "https://duolingo.com/profile/matiz.madel", "pt": "https://duolingo.com/profile/matiz.madel"}',
                'color' => '#58CC02',
                'sort' => 4,
                'description' => '{"en": "View my Duolingo profile", "es": "Ver mi perfil en Duolingo", "fr": "Voir mon profil Duolingo", "pt": "Ver meu perfil no Duolingo"}',
                'created_at' => '2026-05-06 13:46:04',
                'updated_at' => '2026-05-10 02:12:38'
            ]
        ];

        DB::table('external_links')->insert($external_links);
    }
}
