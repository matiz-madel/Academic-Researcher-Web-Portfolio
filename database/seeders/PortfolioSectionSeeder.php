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
                'name' => array(__('admin.resources.work.plural')),
                'sort' => 1,
                'is_active' => true
            ),
            array(
                'identifier' => 'educations',
                'name' => array(__('admin.resources.education.plural')),
                'sort' => 2,
                'is_active' => true
            ),
            array(
                'identifier' => 'employments',
                'name' => array(__('admin.resources.employment.plural')),
                'sort' => 3,
                'is_active' => true
            ),
            array(
                'identifier' => 'activities',
                'name' => array(__('admin.resources.activity.plural')),
                'sort' => 4,
                'is_active' => true
            ),
            array(
                'identifier' => 'fundings',
                'name' => array(__('admin.resources.funding.plural')),
                'sort' => 5,
                'is_active' => true
            ),
            array(
                'identifier' => 'external_links',
                'name' => array(__('admin.resources.external_link.plural')),
                'sort' => 6,
                'is_active' => true
            )
        );
        foreach ($sections as $section) {
            PortfolioSection::updateOrCreate(['identifier' => $section['identifier']], $section);
        }
    }
}
