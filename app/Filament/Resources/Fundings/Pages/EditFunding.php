<?php

namespace App\Filament\Resources\Fundings\Pages;

use App\Filament\Resources\Fundings\FundingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\EditRecord\Concerns\Translatable;

class EditFunding extends EditRecord
{
    use Translatable;

    protected static string $resource = FundingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }
}
