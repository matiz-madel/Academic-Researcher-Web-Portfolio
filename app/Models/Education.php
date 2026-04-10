<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Education extends Model
{
    use HasTranslations;
    protected $guarded = [];

    public array $translatable = [
        'institution',
        'degree',
        'department',
        'city',
        'country'
    ];

    protected function casts(): array
    {
        return [];
    }
}
