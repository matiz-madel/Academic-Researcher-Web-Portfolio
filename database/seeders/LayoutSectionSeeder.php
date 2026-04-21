<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LayoutSection;
use App\Models\Language;
use Illuminate\Support\Facades\Schema;

class LayoutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * This implementation avoids crystallizing translations by fetching
     * values for all active locales from the language files.
     */
    public function run(): void
    {
        // Get all supported locales from the database or config
        $locales = Schema::hasTable('languages')
            ? Language::where('is_active', true)->pluck('code')->toArray()
            : ['fr', 'pt', 'es', 'en', 'it', 'de', 'ar', 'zh', 'ja'];

        // Define the categories using their translation key identifiers
        $sectionsDefinition = [
            ['identifier' => 'works',       'key' => 'work'],
            ['identifier' => 'educations',  'key' => 'education'],
            ['identifier' => 'employments', 'key' => 'employment'],
            ['identifier' => 'activities',  'key' => 'professional_activity'],
            ['identifier' => 'fundings',    'key' => 'funding'],
        ];

        $sortOrder = 1;

        foreach ($sectionsDefinition as $definition) {
            $nameTranslations = [];

            //  Build the translation map for Spatie Translatable
            foreach ($locales as $locale) {
                // Temporarily swap locale to fetch the correct string from admin.php
                app()->setLocale($locale);
                $nameTranslations[$locale] = __("admin.resources.{$definition['key']}.plural");
            }

            // Persistence logic
            LayoutSection::updateOrCreate(
                ['identifier' => $definition['identifier']],
                [
                    'name' => $nameTranslations,
                    'sort' => $sortOrder++,
                    'is_active' => true
                ]
            );
        }

        // Reset locale to default after seeding
        app()->setLocale(config('app.locale'));
    }
}
