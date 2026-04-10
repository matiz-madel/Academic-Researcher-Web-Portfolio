<?php

namespace App\Filament\Resources\ExternalLinks\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ExternalLinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('label')
                    ->label(__('admin.fields.label'))
                    ->required(),
                TextInput::make('url')
                    ->label(__('admin.fields.url'))
                    ->url()
                    ->required(),
                ColorPicker::make('color')
                    ->label('Cor de Fundo do Botão')
                    ->default('#f1f5f9')
                    ->required(),
                TextInput::make('description')
                    ->label(__('admin.fields.description')),
            ]);
    }
}
