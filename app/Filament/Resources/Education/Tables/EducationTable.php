<?php

namespace App\Filament\Resources\Education\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EducationTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('institution')
                    ->label(__('admin.fields.institution'))
                    ->searchable(),
                TextColumn::make('degree')
                    ->label(__('admin.fields.degree'))
                    ->searchable(),
                TextColumn::make('department')
                    ->label(__('admin.fields.department'))
                    ->searchable(),
                TextColumn::make('start_date')
                    ->label(__('admin.fields.start_date'))
                    ->date()
                    ->sortable(),
                TextColumn::make('end_date')
                    ->label(__('admin.fields.end_date'))
                    ->date()
                    ->sortable(),
                TextColumn::make('city')
                    ->label(__('admin.fields.city'))
                    ->searchable(),
                TextColumn::make('country')
                    ->label(__('admin.fields.country'))
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label(__('admin.fields.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('admin.fields.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->paginated(false)
            ->searchable(false)
            ->columnManager(false);
    }
}
