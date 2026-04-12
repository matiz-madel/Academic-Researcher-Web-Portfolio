<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Profile extends Model
{
    use HasTranslations;

    protected $guarded = [];

    public array $translatable = [
        'subtitle',
        'subtitle_variations',
        'default_message',
        'bio'
    ];

    protected function casts(): array
    {
        return [
            'aliases' => 'array',
            'is_whatsapp' => 'boolean',
            'subtitle_variations' => 'array',
        ];
    }

    protected static function booted(): void
    {
        static::saved(function ($profile) {
            Cache::forget('site_profile');
        });
    }
}
