<?php

namespace App\Filament\Resources\Fundings\Schemas;

use App\Enums\FundingType;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FundingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('funding_type')
                    ->options(FundingType::class)
                    ->required()
                    ->label(__('admin.fields.funding_type')),
                TextInput::make('title')
                    ->label(__('admin.fields.title'))
                    ->required(),
                TextInput::make('agency')
                    ->label(__('admin.fields.agency'))
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
