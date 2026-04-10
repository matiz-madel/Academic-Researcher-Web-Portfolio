<?php

namespace App\Filament\Resources\Languages\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class LanguagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ToggleColumn::make('is_active')
                    ->label(__('admin.fields.is_active')),
                TextColumn::make('language_name')
                    ->label(__('admin.fields.language_name'))
                    ->searchable(),
            ])
            ->reorderable('sort')
            ->defaultSort('sort')
            ->filters([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                //
            ])
            ->paginated(false)
            ->searchable(false)
            ->columnManager(false);
    }
}
