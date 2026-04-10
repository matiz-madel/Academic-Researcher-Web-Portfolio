<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Employment extends Model
{
    use HasTranslations;
    protected $guarded = [];

    public array $translatable = [
        'organization',
        'role',
        'department',
        'city',
        'country'
    ];

    protected function casts(): array
    {
        return [];
    }
}
