<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionalActivitySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('professional_activities')->insert([
            [
                'id' => 1,
                'activity_type' => 'membership',
                'title' => '{"en": "University Extension Program in iOS Development", "es": "Programa de Extensión Universitaria en Desarrollo iOS", "fr": "Programme d\'Extension Universitaire en Développement iOS", "pt": "Extensão universitária em Desenvolvimento iOS"}',
                'organization' => '{"en": "Apple Developer Academy, Pontifical Catholic University of Paraná (PUCPR), Brazil", "es": "Apple Developer Academy, Pontificia Universidad Católica de Paraná (PUCPR), Brasil", "fr": "Apple Developer Academy, Université Pontificale Catholique du Paraná (PUCPR), Brésil", "pt": "Apple Developer Academy, Pontifícia Universidade Católica do Paraná (PUCPR), Brasil"}',
                'start_date' => '2019-01-01',
                'end_date' => '2020-12-31',
                'url' => '{"en": "https://developeracademy.pucpr.br/", "es": "https://developeracademy.pucpr.br/", "fr": "https://developeracademy.pucpr.br/", "pt": "https://developeracademy.pucpr.br/"}',
            ],
            [
                'id' => 2,
                'activity_type' => 'membership',
                'title' => '{"en": "University Extension Program in PETECO: Tutorial Education Program in Computer Engineering", "es": "Programa de Extensión Universitaria en PETECO: Programa de Educación Tutorial en Ingeniería Informática", "fr": "Programme d\'Extension Universitaire au sein du PETECO : Programme d\'Éducation Tutorale en Ingénierie Informatique", "pt": "Extensão universitária no PETECO: Programa de Educação Tutorial de Engenharia da Computação"}',
                'organization' => '{"en": "Federal University of Technology - Paraná (UTFPR), Brazil", "es": "Universidad Tecnológica Federal de Paraná (UTFPR), Brasil", "fr": "Université Technologique Fédérale du Paraná (UTFPR), Brésil", "pt": "Universidade Tecnológica Federal do Paraná (UTFPR), Brasil"}',
                'start_date' => '2018-01-01',
                'end_date' => '2019-12-31',
                'url' => '{"en": "https://utfpr.curitiba.br/peteco/", "es": "https://utfpr.curitiba.br/peteco/", "fr": "https://utfpr.curitiba.br/peteco/", "pt": "https://utfpr.curitiba.br/peteco/"}',
            ],
            [
                'id' => 3,
                'activity_type' => 'membership',
                'title' => '{"en": "University Extension Program in PET Direito UFPR: Tutorial Education Program in Law", "es": "Programa de Extensión Universitaria en PET Direito UFPR: Programa de Educación Tutorial en Derecho", "fr": "Programme d\'Extension Universitaire au sein du PET Direito UFPR : Programme d\'Éducation Tutorale en Droit", "pt": "Extensão universitária no PET Direito UFPR: Programa de Educação Tutorial do curso de Direito"}',
                'organization' => '{"en": "Federal University of Paraná (UFPR), Brazil", "es": "Universidad Federal de Paraná (UFPR), Brasil", "fr": "Université Fédérale du Paraná (UFPR), Brésil", "pt": "Universidade Federal do Paraná (UFPR), Brasil"}',
                'start_date' => '2025-03-01',
                'end_date' => '2026-03-01',
                'url' => '{"en": "https://petdireito.ufpr.br/index.php/sobre-o-pet/", "es": "https://petdireito.ufpr.br/index.php/sobre-o-pet/", "fr": "https://petdireito.ufpr.br/index.php/sobre-o-pet/", "pt": "https://petdireito.ufpr.br/index.php/sobre-o-pet/"}',
            ]
        ]);
    }
}
