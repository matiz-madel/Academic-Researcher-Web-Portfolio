<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    public function run(): void
    {
        $languages =
            [
                ['code' => 'fr', 'language_name' => 'Français', 'flag' => '🇫🇷', 'sort' => 1, 'is_active' => true],
                ['code' => 'pt', 'language_name' => 'Português', 'flag' => '🇧🇷', 'sort' => 2, 'is_active' => true],
                ['code' => 'es', 'language_name' => 'Español', 'flag' => '🇲🇽', 'sort' => 3, 'is_active' => true],
                ['code' => 'en', 'language_name' => 'English', 'flag' => '🇬🇧', 'sort' => 4, 'is_active' => true],
            ];
        foreach ($languages as $lang) {
            Language::updateOrCreate(['code' => $lang['code']], $lang);
        }
    }
}
