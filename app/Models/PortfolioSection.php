<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Facades\Cache;

class PortfolioSection extends Model
{
    use HasTranslations;

    protected $guarded = [];
    public array $translatable = ['name'];

    protected static function booted(): void
    {
        static::saved(function () {
            Cache::forget('portfolio_sections_ordered');
            Cache::forget('nav_sort_educations');
            Cache::forget('nav_sort_employments');
            Cache::forget('nav_sort_works');
            Cache::forget('nav_sort_activities');
            Cache::forget('nav_sort_fundings');
        });
    }
}
