<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProfessionalActivity extends Model
{
    use HasTranslations;
    protected $guarded = [];

    public array $translatable = [
        'title',
        'organization'
    ];

    protected function casts(): array
    {
        return array(
            'activity_type' => \App\Enums\ActivityType::class,
        );
    }
}
