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
                ['code' => 'it', 'language_name' => 'Italiano', 'flag' => '🇮🇹', 'sort' => 5, 'is_active' => false],
                ['code' => 'de', 'language_name' => 'Deutsch',  'flag' => '🇩🇪', 'sort' => 6, 'is_active' => false],
                ['code' => 'ar', 'language_name' => 'العربية',  'flag' => '🇸🇦', 'sort' => 7, 'is_active' => false],
                ['code' => 'zh', 'language_name' => '中文',     'flag' => '🇨🇳', 'sort' => 8, 'is_active' => false],
                ['code' => 'ja', 'language_name' => '日本語',   'flag' => '🇯🇵', 'sort' => 9, 'is_active' => false],
            ];
        foreach ($languages as $lang) {
            Language::updateOrCreate(['code' => $lang['code']], $lang);
        }
    }
}
