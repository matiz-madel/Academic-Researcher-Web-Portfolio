<?php

namespace App\Filament\Resources\LayoutSections;

use App\Filament\Resources\LayoutSections\Pages\CreateLayoutSection;
use App\Filament\Resources\LayoutSections\Pages\EditLayoutSection;
use App\Filament\Resources\LayoutSections\Pages\ListLayoutSections;
use App\Filament\Resources\LayoutSections\Schemas\LayoutSectionForm;
use App\Filament\Resources\LayoutSections\Tables\LayoutSectionsTable;
use App\Models\LayoutSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class LayoutSectionResource extends Resource
{
    protected static ?string $model = LayoutSection::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ViewColumns;
    protected static?string $navigationLabel = 'Page Layout';
    protected static ?string $recordTitleAttribute = 'name';
    protected static bool $shouldRegisterNavigation = false;
    public static function canCreate(): bool { return false; }
    public static function canDelete(Model $record): bool { return false; }
    public static function form(Schema $schema): Schema
    {
        return LayoutSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LayoutSectionsTable::configure($table);
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
            'edit' => Pages\EditLayoutSection::route('/{record}/edit'),
        ];
    }

    public static function getNavigationSort():?int
    {
        return 98;
    }
}
