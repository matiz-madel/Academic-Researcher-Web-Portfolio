<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Language extends Model
{
    // Allows the seeder and Filament to mass assign the table
    protected $guarded = [];

    // Clears the cache whenever a language is activated/deactivated in the panel
    protected static function booted(): void
    {
        static::saved(function () {
            Cache::forget('site_languages_models');
            Cache::forget('default_active_locale');
        });

        static::deleted(function () {
            Cache::forget('site_languages_models');
            Cache::forget('default_active_locale');
        });
    }

    /**
     * Get the code of the default (primary) active language.
     * Uses cache for performance since this is called frequently in forms.
     */
    public static function getDefaultLocale(): string
    {
        return \Illuminate\Support\Facades\Cache::rememberForever('default_active_locale', function () {
            return self::where('is_active', true)->orderBy('sort')->value('code') ?? 'fr';
        });
    }
}
