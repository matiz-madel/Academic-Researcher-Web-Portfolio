<?php

namespace App\Filament\Resources\PublicProfile\Pages;

use App\Filament\Resources\PublicProfile\PublicProfileResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use LaraZeus\SpatieTranslatable\Resources\Pages\EditRecord\Concerns\Translatable;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;

class EditPublicProfile extends EditRecord
{
    use Translatable;
    protected static string $resource = PublicProfileResource::class;
    public function mount(int | string $record = 1): void
    {
        parent::mount($record);
    }

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }
}
