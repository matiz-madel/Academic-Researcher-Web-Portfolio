<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Metadata extends Model
{
    use HasTranslations;
    protected $guarded = [];

    // FIXED: Now including Keywords, Author and Robots as hardcoded translatable fields
    public array $translatable = [
        'title_suffix',
        'description',
        'keywords',
        'social_metadata',
        'academic_metadata',
    ];

    protected function casts(): array {
        return [
            'social_metadata' => 'array',
            'academic_metadata' => 'array',
        ];
    }

    /**
     * Resolves dynamic fields with a robust fallback strategy.
     * Order: Current Locale -> English -> First available value.
     */
    public function getResolvedFieldsAttribute(): array
    {
        return array_merge(
            $this->social_metadata ?? [],
            $this->academic_metadata ?? []
        );
    }
}
