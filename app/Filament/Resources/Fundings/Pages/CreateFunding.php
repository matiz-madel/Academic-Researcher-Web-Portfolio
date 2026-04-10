<?php

namespace App\Filament\Resources\Fundings\Pages;

use App\Filament\Resources\Fundings\FundingResource;
use Filament\Resources\Pages\CreateRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateFunding extends CreateRecord
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
