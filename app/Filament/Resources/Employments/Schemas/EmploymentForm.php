<?php

namespace App\Filament\Resources\Employments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EmploymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('organization')
                    ->label(__('admin.fields.organization'))
                    ->required(fn ($livewire) => !property_exists($livewire, 'activeLocale') || $livewire->activeLocale === \App\Models\Language::getDefaultLocale()),
                TextInput::make('role')
                    ->label(__('admin.fields.role'))
                    ->required(fn ($livewire) => !property_exists($livewire, 'activeLocale') || $livewire->activeLocale === \App\Models\Language::getDefaultLocale()),
                TextInput::make('department')
                    ->label(__('admin.fields.department')),
                DatePicker::make('start_date')
                    ->label(__('admin.fields.start_date')),
                DatePicker::make('end_date')
                    ->label(__('admin.fields.end_date')),
                TextInput::make('city')
                    ->label(__('admin.fields.city')),
                TextInput::make('country')
                    ->label(__('admin.fields.country')),
            ]);
    }
}
