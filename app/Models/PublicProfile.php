<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Facades\Cache;

class PublicProfile extends Model
{
    use HasTranslations;

    protected $table = 'public_profile';
    protected $guarded = [];

    public array $translatable = [
        'subtitle',
        'subtitle_variations',
        'default_message',
        'bio'
    ];

    protected function casts(): array
    {
        return [
            'aliases' => 'array',
            'is_whatsapp' => 'boolean',
            'subtitle_variations' => 'array',
        ];
    }

    protected static function booted(): void
    {
        static::saved(function ($profile) {
            Cache::forget('site_profile');
        });
    }

    /**
     * Accessor to get the formatted contact link (WhatsApp or standard tel URI).
     */
    public function getContactLinkAttribute(): string
    {
        if (empty($this->phone)) {
            return '#';
        }

        // Remove all non-numeric characters
        $cleanPhone = preg_replace('/[^0-9]/', '', $this->phone);

        if ($this->is_whatsapp) {
            $link = "https://api.whatsapp.com/send/?phone={$cleanPhone}";

            if ($this->default_message) {
                $link .= '&' . http_build_query(['text' => $this->default_message], '', '&', PHP_QUERY_RFC3986);
            }

            return $link;
        }

        return "tel:{$cleanPhone}";
    }

    /**
     * Accessor for full name.
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Accessor to merge subtitle and variations for display or meta.
     */
    public function getAllTitlesAttribute(): array
    {
        $titles = [$this->getTranslation('subtitle', app()->getLocale())];

        if (is_array($this->subtitle_variations)) {
            $titles = array_merge($titles, $this->subtitle_variations);
        }

        return array_unique(array_filter($titles));
    }
}
