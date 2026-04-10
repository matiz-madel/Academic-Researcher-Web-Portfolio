<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PortfolioSection;

class PortfolioSectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = array(
            array(
                'identifier' => 'works',
                'name' => array('fr' => 'Publications', 'pt' => 'Publicações', 'en' => 'Publications', 'es' => 'Publicaciones'),
                'sort' => 1,
                'is_active' => true
            ),
            array(
                'identifier' => 'educations',
                'name' => array('fr' => 'Formations', 'pt' => 'Formações Acadêmicas', 'en' => 'Educations', 'es' => 'Educación'),
                'sort' => 2,
                'is_active' => true
            ),
            array(
                'identifier' => 'employments',
                'name' => array('fr' => 'Expériences professionnelles', 'pt' => 'Atuação Profissional', 'en' => 'Employments', 'es' => 'Experiencia Profesional'),
                'sort' => 3,
                'is_active' => true
            ),
            array(
                'identifier' => 'activities',
                'name' => array('fr' => 'Activités professionnelles', 'pt' => 'Atividades Profissionais', 'en' => 'Professional Activities', 'es' => 'Actividades Profesionales'),
                'sort' => 4,
                'is_active' => true
            ),
            array(
                'identifier' => 'fundings',
                'name' => array('fr' => 'Financements', 'pt' => 'Financiamentos', 'en' => 'Fundings', 'es' => 'Financiación'),
                'sort' => 5,
                'is_active' => true
            ),
            array(
                'identifier' => 'links',
                'name' => array('fr' => 'Links Externos', 'pt' => 'Links Externos', 'en' => 'Links Externos', 'es' => 'Links Externos'),
                'sort' => 6,
                'is_active' => true
            )
        );
        foreach ($sections as $section) {
            PortfolioSection::updateOrCreate(['identifier' => $section['identifier']], $section);
        }
    }
}
