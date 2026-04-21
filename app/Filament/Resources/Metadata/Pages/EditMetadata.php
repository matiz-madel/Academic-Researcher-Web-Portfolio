<?php

namespace App\Filament\Resources\Metadata\Pages;

use App\Filament\Resources\Metadata\MetadataResource;
use Filament\Resources\Pages\EditRecord;
use App\Models\Metadata;
use LaraZeus\SpatieTranslatable\Resources\Pages\EditRecord\Concerns\Translatable;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;

class EditMetadata extends EditRecord
{
    use Translatable;
    protected static string $resource = MetadataResource::class;

    /**
     * Override the mount method to make this a Singleton page.
     * We force it to edit the first record instead of looking for an ID in the URL.
     */
    public function mount(int|string $record = 1): void
    {
        // Ensure at least one record exists in the database to edit
        $metadata = Metadata::firstOrCreate(['id' => 1]);

        parent::mount($metadata->id);
    }

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }
}
