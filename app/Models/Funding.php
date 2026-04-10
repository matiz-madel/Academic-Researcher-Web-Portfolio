<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Funding extends Model
{
    use HasTranslations;
    protected $guarded = [];

    public array $translatable = [
        'title',
        'agency'
    ];

    protected function casts(): array
    {
        return array(
            'funding_type' => \App\Enums\FundingType::class,
        );
    }
}
