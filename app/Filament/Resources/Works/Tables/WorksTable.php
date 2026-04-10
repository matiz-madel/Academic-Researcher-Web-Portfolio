<?php

namespace App\Filament\Resources\Works\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WorksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(__('admin.fields.title'))
                    ->searchable(),
                TextColumn::make('type')
                    ->label(__('admin.fields.type'))
                    ->searchable(),
                TextColumn::make('publication_date')
                    ->label(__('admin.fields.publication_date'))
                    ->date()
                    ->sortable(),
                TextColumn::make('doi')
                    ->label(__('admin.fields.doi'))
                    ->searchable(),
                TextColumn::make('url')
                    ->label(__('admin.fields.url'))
                    ->searchable(),
                TextColumn::make('keyword_1')
                    ->label(__('admin.fields.keyword_1'))
                    ->searchable(),
                TextColumn::make('keyword_2')
                    ->label(__('admin.fields.keyword_2'))
                    ->searchable(),
                TextColumn::make('keyword_3')
                    ->label(__('admin.fields.keyword_3'))
                    ->searchable(),
                TextColumn::make('keyword_4')
                    ->label(__('admin.fields.keyword_4'))
                    ->searchable(),
                TextColumn::make('keyword_5')
                    ->label(__('admin.fields.keyword_5'))
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
