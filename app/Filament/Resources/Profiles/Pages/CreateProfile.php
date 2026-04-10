<?php

namespace App\Filament\Resources\Profiles\Pages;

use App\Filament\Resources\Profiles\ProfileResource;
use Filament\Resources\Pages\CreateRecord;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class CreateProfile extends CreateRecord
{
    use Translatable;
    protected static string $resource = ProfileResource::class;
}
