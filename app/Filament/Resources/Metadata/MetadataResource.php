<?php

namespace App\Filament\Resources\Metadata;

use App\Filament\Resources\Metadata\Pages\EditMetadata;
use App\Filament\Resources\Metadata\Schemas\MetadataForm;
use App\Filament\Resources\Metadata\Tables\MetadataTable;
use App\Models\Metadata;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

/**
 * ARCHITECTURE NOTE:
 * This Resource acts as a Singleton. We use a Resource instead of a Custom Page
 * to maintain native compatibility with LaraZeus/Spatie Translatable traits
 * which hook deeply into EditRecord pages.
 * List and Create actions are intentionally disabled.
 */
class MetadataResource extends Resource
{
    use Translatable;
    protected static ?string $model = Metadata::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ComputerDesktop;

    protected static ?string $recordTitleAttribute = 'title_suffix';

    public static function getModelLabel(): string
    {
        return __('admin.resources.metadata');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.resources.metadata');
    }

    public static function canCreate(): bool { return false; }
    public static function canDelete(Model $record): bool { return false; }

    public static function form(Schema $schema): Schema
    {
        return MetadataForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MetadataTable::configure($table);
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
            'index' => Pages\EditMetadata::route('/'),
        ];
    }
}
