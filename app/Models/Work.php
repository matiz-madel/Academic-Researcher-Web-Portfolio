<?php

namespace App\Models;

use App\Enums\WorkType;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Work extends Model
{
    use HasTranslations;
    protected $guarded = [];

    public array $translatable = [
        'title',
        'abstract',
        'content',
        'keyword_1',
        'keyword_2',
        'keyword_3',
        'keyword_4',
        'keyword_5'
    ];

    protected function casts(): array
    {
        return [
            'type' => WorkType::class,
        ];
    }
}
