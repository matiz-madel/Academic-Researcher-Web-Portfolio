<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('employments')->insert([
            [
                'id' => 1,
                'organization' => '{"en": "Paraná State Court of Justice (TJPR)", "es": "Tribunal de Justicia del Estado de Paraná (TJPR)", "fr": "Tribunal de Justice de l\'État du Paraná (TJPR)", "pt": "Tribunal de Justiça do Estado do Paraná (TJPR)"}',
                'role' => '{"en": "Legal Intern", "es": "Pasante de Derecho", "fr": "Stagiaire en Droit", "pt": "Estagiária de Direito"}',
                'department' => '{"en": "3rd Court of Domestic and Family Violence Against Women", "es": "3º Juzgado de Violencia Doméstica y Familiar Contra la Mujer", "fr": "3ème Tribunal de Violence Domestique et Familiale Envers les Femmes", "pt": "3º Juizado de Violência Doméstica e Familiar Contra a Mulher"}',
                'start_date' => '2022-07-01',
                'end_date' => '2023-03-31',
                'city' => 'Curitiba',
                'country' => '{"en": "Brazil", "es": "Brasil", "fr": "Brésil", "pt": "Brasil"}',
            ]
        ]);
    }
}
