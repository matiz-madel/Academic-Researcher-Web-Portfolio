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
        'keyword_5',
        'attachments',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'type' => WorkType::class,
            'publication_date' => 'date', // Cast automatically to Carbon
        ];
    }

    /**
     * Accessor to get just the year of the publication date.
     */
    public function getPublicationYearAttribute(): ?string
    {
        return $this->publication_date ? $this->publication_date->format('Y') : null;
    }

    /**
     * Accessor to get a clean array of valid keywords.
     * This removes the need for logic inside the Blade View.
     */
    public function getValidKeywordsAttribute(): array
    {
        $keywords = [
            $this->keyword_1,
            $this->keyword_2,
            $this->keyword_3,
            $this->keyword_4,
            $this->keyword_5,
        ];

        // Filter out empty or null values
        return array_filter($keywords, fn($val) => !empty(trim($val)));
    }

    /**
     * Accessor to get attachments with their respective file extensions.
     * Prevents logic processing inside Blade views.
     */
    public function getAttachmentsDataAttribute(): array
    {
        // Fetch attachments for the current locale safely
        $currentAttachments = $this->getTranslation('attachments', app()->getLocale(), false);

        // Decode if Laravel returns a raw JSON string
        if (is_string($currentAttachments)) {
            $currentAttachments = json_decode($currentAttachments, true);
        }

        if (empty($currentAttachments) || !is_array($currentAttachments)) {
            return [];
        }

        $formattedAttachments = [];
        foreach ($currentAttachments as $index => $path) {
            $formattedAttachments[$index] = [
                'path' => $path,
                'extension' => strtoupper(pathinfo($path, PATHINFO_EXTENSION))
            ];
        }

        return $formattedAttachments;
    }
}
