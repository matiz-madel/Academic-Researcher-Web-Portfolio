<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Facades\Cache;

class LayoutSection extends Model
{
    use HasTranslations;

    protected $guarded = [];
    public array $translatable = ['name'];

    /**
     * Determine if the section has associated data to be displayed.
     */
    public function getHasDataAttribute(): bool
    {
        return match ($this->identifier) {
            'works'       => Work::exists(),
            'educations'  => Education::exists(),
            'employments' => Employment::exists(),
            'activities'  => ProfessionalActivity::exists(),
            'fundings'    => Funding::exists(),
            default       => false,
        };
    }
    protected static function booted(): void
    {
        static::saved(function () {
            Cache::forget('layout_sections_ordered');
            Cache::forget('nav_sort_educations');
            Cache::forget('nav_sort_employments');
            Cache::forget('nav_sort_works');
            Cache::forget('nav_sort_activities');
            Cache::forget('nav_sort_fundings');
        });
    }
}
