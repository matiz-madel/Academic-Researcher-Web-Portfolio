<?php

namespace App\Filament\Resources\ProfessionalActivities\Pages;

use App\Filament\Resources\ProfessionalActivities\ProfessionalActivityResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\EditRecord\Concerns\Translatable;

class EditProfessionalActivity extends EditRecord
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
