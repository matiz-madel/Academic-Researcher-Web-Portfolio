<?php

namespace App\Filament\Resources\PortfolioSections;

use App\Filament\Resources\PortfolioSections\Pages\CreatePortfolioSection;
use App\Filament\Resources\PortfolioSections\Pages\EditPortfolioSection;
use App\Filament\Resources\PortfolioSections\Pages\ListPortfolioSections;
use App\Filament\Resources\PortfolioSections\Schemas\PortfolioSectionForm;
use App\Filament\Resources\PortfolioSections\Tables\PortfolioSectionsTable;
use App\Models\PortfolioSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class PortfolioSectionResource extends Resource
{
    protected static ?string $model = PortfolioSection::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ViewColumns;
    protected static?string $navigationLabel = 'Layout da Página';
    protected static ?string $recordTitleAttribute = 'name';
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return PortfolioSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PortfolioSectionsTable::configure($table);
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
            'index' => ListPortfolioSections::route('/'),
            'create' => CreatePortfolioSection::route('/create'),
            'edit' => EditPortfolioSection::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool { return false; }
    public static function canDelete(Model $record): bool { return false; }

    public static function getNavigationSort():?int
    {
        return 98;
    }
}
