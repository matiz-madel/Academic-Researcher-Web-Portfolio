<?php

namespace App\Filament\Resources\ExternalLinks\Pages;

use App\Filament\Resources\ExternalLinks\ExternalLinkResource;
use Filament\Resources\Pages\CreateRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateExternalLink extends CreateRecord
{
    use Translatable;

    protected static string $resource = ExternalLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }
}
