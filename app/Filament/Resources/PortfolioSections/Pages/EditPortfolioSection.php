<?php

namespace App\Filament\Resources\PortfolioSections\Pages;

use App\Filament\Resources\PortfolioSections\PortfolioSectionResource;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioSection extends EditRecord
{
    protected static string $resource = PortfolioSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
