<?php

namespace App\Filament\Resources\LayoutSections\Pages;

use App\Filament\Resources\LayoutSections\LayoutSectionResource;
use Filament\Resources\Pages\EditRecord;

class EditLayoutSection extends EditRecord
{
    protected static string $resource = LayoutSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
