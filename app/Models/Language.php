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
        });

        static::deleted(function () {
            Cache::forget('site_languages_models');
        });
    }
}
