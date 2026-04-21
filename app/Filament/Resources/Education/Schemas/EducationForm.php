<?php

namespace App\Filament\Resources\Education\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EducationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('institution')
                    ->label(__('admin.fields.institution'))
                    ->required(),
                TextInput::make('degree')
                    ->label(__('admin.fields.degree'))
                    ->required(),
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
