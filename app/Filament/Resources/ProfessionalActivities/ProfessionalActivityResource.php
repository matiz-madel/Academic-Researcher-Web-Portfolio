<?php

namespace App\Filament\Resources\ProfessionalActivities;

use App\Filament\Resources\ProfessionalActivities\Pages\CreateProfessionalActivity;
use App\Filament\Resources\ProfessionalActivities\Pages\EditProfessionalActivity;
use App\Filament\Resources\ProfessionalActivities\Pages\ListProfessionalActivities;
use App\Filament\Resources\ProfessionalActivities\Schemas\ProfessionalActivityForm;
use App\Filament\Resources\ProfessionalActivities\Tables\ProfessionalActivitiesTable;
use App\Models\ProfessionalActivity;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class ProfessionalActivityResource extends Resource
{
    use Translatable;

    protected static ?string $model = ProfessionalActivity::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::PresentationChartBar;

    protected static ?string $recordTitleAttribute = 'title';

    public static function getModelLabel(): string
    {
        return __('admin.resources.professional_activity.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.resources.professional_activity.plural');
    }

    public static function form(Schema $schema): Schema
    {
        return ProfessionalActivityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfessionalActivitiesTable::configure($table);
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
            'index' => ListProfessionalActivities::route('/'),
            'create' => CreateProfessionalActivity::route('/create'),
            'edit' => EditProfessionalActivity::route('/{record}/edit'),
        ];
    }
    public static function getNavigationSort():?int
    {
        if (!\Illuminate\Support\Facades\Schema::hasTable('portfolio_sections')) return 0;
        return \App\Models\PortfolioSection::where('identifier', 'activities')->value('sort')?? 0;
    }
}
