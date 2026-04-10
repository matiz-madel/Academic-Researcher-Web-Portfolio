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
        'default_message',
        'bio'
    ];

    // Converte o JSON do banco para uma lista manipulável no PHP
    protected function casts(): array
    {
        return [
            'aliases' => 'array',
            'is_whatsapp' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saved(function ($profile) {
            Cache::forget('site_profile');

            // Se houver um GIF recém-salvo, aplica o limite de 4 ciclos
            if ($profile->avatar_gif) {
                $path = storage_path('app/public/'. $profile->avatar_gif);
                $manager = new ImageManager(new Driver());
                $image = $manager->read($path);
                $image->setLoops(4); // Configura o GIF para parar após 4 ciclos
                $image->save();
            }
        });
    }
}
