<?php

namespace App\Filament\Resources\ProfessionalActivities\Schemas;

use App\Enums\ActivityType;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProfessionalActivityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('activity_type')
                    ->options(ActivityType::class)
                    ->label(__('admin.fields.activity_type'))
                    ->required(),
                TextInput::make('title')
                    ->label(__('admin.fields.title'))
                    ->required(),
                TextInput::make('organization')
                    ->label(__('admin.fields.organization'))
                    ->required(),
                DatePicker::make('start_date')
                    ->label(__('admin.fields.start_date')),
                DatePicker::make('end_date')
                    ->label(__('admin.fields.end_date')),
                TextInput::make('url')
                    ->label(__('admin.fields.url'))
                    ->url(),
            ]);
    }
}
