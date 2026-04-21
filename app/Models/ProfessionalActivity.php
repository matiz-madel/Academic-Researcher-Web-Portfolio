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
        'organization',
        'url'
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'activity_type' => \App\Enums\ActivityType::class,
            // Cast dates automatically to Carbon instances
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    /**
     * Accessor to get just the year of the start date.
     */
    public function getStartYearAttribute(): ?string
    {
        return $this->start_date ? $this->start_date->format('Y') : null;
    }

    /**
     * Accessor to get just the year of the end date.
     */
    public function getEndYearAttribute(): ?string
    {
        return $this->end_date ? $this->end_date->format('Y') : null;
    }
}
