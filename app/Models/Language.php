<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Language extends Model
{
    // Permite que o seeder e o Filament preencham a tabela
    protected $guarded = [];

    // Limpa o cache sempre que um idioma for ativado/desativado no painel
    protected static function booted(): void
    {
        static::saved(function () {
            Cache::forget('site_languages_models');
        });

        static::deleted(function () {
            Cache::forget('site_languages_models');
        });
    }
}
