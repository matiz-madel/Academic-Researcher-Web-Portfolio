<?php

namespace App\Filament\Resources\ProfessionalActivities\Pages;

use App\Filament\Resources\ProfessionalActivities\ProfessionalActivityResource;
use Filament\Resources\Pages\CreateRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateProfessionalActivity extends CreateRecord
{
    use Translatable;

    protected static string $resource = ProfessionalActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }
}
