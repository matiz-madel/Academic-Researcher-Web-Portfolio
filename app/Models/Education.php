<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Carbon\Carbon;

class Education extends Model
{
    use HasTranslations;
    protected $guarded = [];

    public array $translatable = [
        'institution',
        'degree',
        'department',
        'country'
    ];

    /**
     * Get the attributes that should be cast.
     * * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // Cast dates to Carbon instances automatically
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
