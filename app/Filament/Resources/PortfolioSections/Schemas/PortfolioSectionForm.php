<?php

namespace App\Filament\Resources\PortfolioSections\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PortfolioSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('name')
                    ->label(__('admin.fields.name'))
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('identifier')
                    ->label(__('admin.fields.identifier'))
                    ->required(),
                TextInput::make('sort')
                    ->label(__('admin.fields.sort'))
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label(__('admin.fields.is_active'))
                    ->required()
                    ->default(false),
            ]);
    }
}
