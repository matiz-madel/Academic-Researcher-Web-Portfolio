<?php

namespace App\Filament\Resources\Education;

use App\Filament\Resources\Education\Pages\CreateEducation;
use App\Filament\Resources\Education\Pages\EditEducation;
use App\Filament\Resources\Education\Pages\ListEducation;
use App\Filament\Resources\Education\Schemas\EducationForm;
use App\Filament\Resources\Education\Tables\EducationTable;
use App\Models\Education;
use App\Models\PortfolioSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Cache;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class EducationResource extends Resource
{
    use Translatable;

    protected static ?string $model = Education::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::AcademicCap;

    protected static ?string $recordTitleAttribute = 'institution';

    public static function getModelLabel(): string
    {
        return __('admin.resources.education.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.resources.education.plural');
    }

    public static function form(Schema $schema): Schema
    {
        return EducationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EducationTable::configure($table);
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
            'index' => ListEducation::route('/'),
            'create' => CreateEducation::route('/create'),
            'edit' => EditEducation::route('/{record}/edit'),
        ];
    }
    public static function getNavigationSort():?int
    {
        if (!\Illuminate\Support\Facades\Schema::hasTable('portfolio_sections')) return 0;
        return \App\Models\PortfolioSection::where('identifier', 'educations')->value('sort')?? 0;
    }
}
