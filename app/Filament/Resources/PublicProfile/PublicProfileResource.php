<?php

namespace App\Filament\Resources\PublicProfile;

use App\Filament\Resources\PublicProfile\Pages\CreateProfile;
use App\Filament\Resources\PublicProfile\Pages\EditPublicProfile;
use App\Filament\Resources\PublicProfile\Pages\ListProfiles;
use App\Filament\Resources\PublicProfile\Schemas\PublicProfileForm;
use App\Filament\Resources\PublicProfile\Tables\PublicProfileTable;
use App\Models\PublicProfile;
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
class PublicProfileResource extends Resource
{
    use Translatable;
    protected static ?string $model = PublicProfile::class;

    protected static?string $slug = 'profile';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::User;

    protected static ?string $recordTitleAttribute = 'first_name';
    public static function getModelLabel(): string
    {
        return __('admin.resources.profile');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.resources.profile');
    }
    public static function canCreate(): bool { return false; }
    public static function canDelete(Model $record): bool { return false; }
    public static function form(Schema $schema): Schema
    {
        return PublicProfileForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PublicProfileTable::configure($table);
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
            'index' => Pages\EditPublicProfile::route('/'),
        ];
    }
}
