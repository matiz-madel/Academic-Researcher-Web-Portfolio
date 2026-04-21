<?php

namespace App\Filament\Resources\LayoutSections\Tables;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LayoutSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->reorderable('sort')
            ->defaultSort('sort')
            ->columns([
                TextColumn::make('name')
                    ->label(__('admin.fields.category'))
                    ->color('primary')
                    ->weight('bold')
                    ->url(fn ($record) => self::getSectionUrl($record)),
                IconColumn::make('is_active')
                    ->label(__('admin.fields.status'))
                    ->boolean()
                    ->state(fn ($record) => $record->has_data)
                    ->tooltip(fn ($state) => $state
                        ? __('admin.messages.section_active')
                        : __('admin.messages.section_inactive')
                    )
                    ->url(fn ($record) => self::getSectionUrl($record)),
            ]);
    }

    /**
     * Maps the section identifier to the correct dynamic admin panel URL.
     */
    private static function getSectionUrl($record): string
    {
        // Fetch the dynamic admin path from config, fallback to 'admin'
        $adminPath = config('app.admin_path', 'admin');

        $routes = [
            'works'       => "/{$adminPath}/works",
            'educations'  => "/{$adminPath}/educations",
            'employments' => "/{$adminPath}/employments",
            'activities'  => "/{$adminPath}/professional-activities",
            'fundings'    => "/{$adminPath}/fundings",
        ];

        return url($routes[$record->identifier] ?? "/{$adminPath}");
    }
}
