<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('education')->insert([
            [
                'id' => 1,
                'institution' => '{"en": "Federal University of Paraná (UFPR)", "es": "Universidad Federal de Paraná (UFPR)", "fr": "Université Fédérale du Paraná (UFPR)", "pt": "Universidade Federal do Paraná (UFPR)"}',
                'degree' => '{"en": "Bachelor of Laws", "es": "Grado en Derecho", "fr": "Diplôme d\'études supérieures en Droit (Bac+5)", "pt": "Graduação em Direito"}',
                'department' => '{"en": "Department of Legal Sciences", "es": "Departamento de Ciencias Jurídicas", "fr": "Département de Sciences Juridiques", "pt": "Departamento de Ciências Jurídicas"}',
                'start_date' => '2021-12-31',
                'end_date' => '2026-12-31',
                'city' => 'Curitiba',
                'country' => '{"en": "Brazil", "es": "Brasil", "fr": "Brésil", "pt": "Brasil"}'
            ],
            [
                'id' => 2,
                'institution' => '{"en": "Federal University of Technology - Paraná (UTFPR)", "es": "Universidad Tecnológica Federal de Paraná (UTFPR)", "fr": "Université Technologique Fédérale du Paraná (UTFPR)", "pt": "Universidade Tecnológica Federal do Paraná (UTFPR)"}',
                'degree' => '{"en": "Information Systems", "es": "Sistemas de Información", "fr": "Études en Systèmes d\'Information (Bac+4)", "pt": "Estudos em Sistemas de Informação"}',
                'department' => '{"en": "Department of Informatics", "es": "Departamento de Informática", "fr": "Département d\'Informatique", "pt": "Departamento de Informática"}',
                'start_date' => '2017-01-01',
                'end_date' => '2020-12-31',
                'city' => 'Curitiba',
                'country' => '{"en": "Brazil", "es": "Brasil", "fr": "Brésil", "pt": "Brasil"}',
            ],
            [
                'id' => 3,
                'institution' => '{"en": "Federal Institute of Paraná (IFPR)", "es": "Instituto Federal de Paraná (IFPR)", "fr": "Institut Fédéral du Paraná (IFPR)", "pt": "Instituto Federal do Paraná (IFPR)"}',
                'degree' => '{"en": "Vocational High School Diploma in Business Administration", "es": "Técnica en Administración de Empresas", "fr": "Baccalauréat Professionnel en Administration des Entreprises", "pt": "Técnica em Administração"}',
                'department' => null,
                'start_date' => '2014-01-01',
                'end_date' => '2016-12-31',
                'city' => 'Curitiba',
                'country' => '{"en": "Brazil", "es": "Brasil", "fr": "Brésil", "pt": "Brasil"}'
            ]
        ]);
    }
}
