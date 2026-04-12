<?php

namespace App\Filament\Resources\Fundings;

use App\Filament\Resources\Fundings\Pages\CreateFunding;
use App\Filament\Resources\Fundings\Pages\EditFunding;
use App\Filament\Resources\Fundings\Pages\ListFundings;
use App\Filament\Resources\Fundings\Schemas\FundingForm;
use App\Filament\Resources\Fundings\Tables\FundingsTable;
use App\Models\Funding;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class FundingResource extends Resource
{
    use Translatable;

    protected static ?string $model = Funding::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::CurrencyEuro;

    protected static ?string $recordTitleAttribute = 'title';

    public static function getModelLabel(): string
    {
        return __('admin.resources.funding.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.resources.funding.plural');
    }
    public static function form(Schema $schema): Schema
    {
        return FundingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FundingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFundings::route('/'),
            'create' => CreateFunding::route('/create'),
            'edit' => EditFunding::route('/{record}/edit'),
        ];
    }
    public static function getNavigationSort():?int
    {
        if (!\Illuminate\Support\Facades\Schema::hasTable('portfolio_sections')) return 0;
        return \App\Models\PortfolioSection::where('identifier', 'fundings')->value('sort')?? 0;
    }
}
