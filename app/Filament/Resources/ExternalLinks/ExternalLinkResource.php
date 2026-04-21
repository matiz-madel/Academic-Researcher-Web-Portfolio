<?php

namespace App\Filament\Resources\ExternalLinks;

use App\Filament\Resources\ExternalLinks\Pages\CreateExternalLink;
use App\Filament\Resources\ExternalLinks\Pages\EditExternalLink;
use App\Filament\Resources\ExternalLinks\Pages\ListExternalLinks;
use App\Filament\Resources\ExternalLinks\Schemas\ExternalLinkForm;
use App\Filament\Resources\ExternalLinks\Tables\ExternalLinksTable;
use App\Models\ExternalLink;
use App\Models\LayoutSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Cache;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class ExternalLinkResource extends Resource
{
    use Translatable;

    protected static ?string $model = ExternalLink::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Link;

    protected static ?string $recordTitleAttribute = 'label';

    public static function getModelLabel(): string
    {
        return __('admin.resources.external_link.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.resources.external_link.plural');
    }

    public static function form(Schema $schema): Schema
    {
        return ExternalLinkForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExternalLinksTable::configure($table);
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
            'index' => ListExternalLinks::route('/'),
            'create' => CreateExternalLink::route('/create'),
            'edit' => EditExternalLink::route('/{record}/edit'),
        ];
    }
    public static function getNavigationSort():?int
    {
        if (!\Illuminate\Support\Facades\Schema::hasTable('layout_sections')) return 0;
        return \App\Models\LayoutSection::where('identifier', 'links')->value('sort')?? 0;
    }
}
