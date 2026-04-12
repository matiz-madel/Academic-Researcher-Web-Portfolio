<?php

namespace App\Filament\Resources\Employments;

use App\Filament\Resources\Employments\Pages\CreateEmployment;
use App\Filament\Resources\Employments\Pages\EditEmployment;
use App\Filament\Resources\Employments\Pages\ListEmployments;
use App\Filament\Resources\Employments\Schemas\EmploymentForm;
use App\Filament\Resources\Employments\Tables\EmploymentsTable;
use App\Models\Employment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class EmploymentResource extends Resource
{
    use Translatable;

    protected static ?string $model = Employment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ClipboardDocumentCheck;

    protected static ?string $recordTitleAttribute = 'role';

    public static function getModelLabel(): string
    {
        return __('admin.resources.employment.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.resources.employment.plural');
    }

    public static function form(Schema $schema): Schema
    {
        return EmploymentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EmploymentsTable::configure($table);
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
            'index' => ListEmployments::route('/'),
            'create' => CreateEmployment::route('/create'),
            'edit' => EditEmployment::route('/{record}/edit'),
        ];
    }
    public static function getNavigationSort():?int
    {
        if (!\Illuminate\Support\Facades\Schema::hasTable('portfolio_sections')) return 0;
        return \App\Models\PortfolioSection::where('identifier', 'employments')->value('sort')?? 0;
    }
}
