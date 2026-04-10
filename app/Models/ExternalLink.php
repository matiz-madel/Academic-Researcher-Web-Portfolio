<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ExternalLink extends Model
{
    use HasTranslations;
    protected $guarded = [];

    public array $translatable = [
        'label',
        'description'
    ];

    protected function casts(): array
    {
        return [];
    }
}
