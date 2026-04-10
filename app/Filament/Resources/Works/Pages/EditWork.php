<?php

namespace App\Filament\Resources\Works\Pages;

use App\Filament\Resources\Works\WorkResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use LaraZeus\SpatieTranslatable\Resources\Pages\EditRecord\Concerns\Translatable;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;

class EditWork extends EditRecord
{
    use Translatable;

    protected static string $resource = WorkResource::class;

    protected function getHeaderActions(): array
    {

        return [
            LocaleSwitcher::make(),
        ];
    }
}
