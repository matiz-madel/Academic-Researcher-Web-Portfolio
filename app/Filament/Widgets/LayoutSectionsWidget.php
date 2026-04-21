<?php

namespace App\Filament\Widgets;

use App\Models\Education;
use App\Models\Employment;
use App\Models\ExternalLink;
use App\Models\Funding;
use App\Models\ProfessionalActivity;
use App\Models\Work;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LayoutSections;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class LayoutSectionsWidget extends TableWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static?int $sort = 1;
    protected static?string $heading = 'Main Page Layout';

    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\LayoutSection::query())
            ->reorderable('sort')
            ->defaultSort('sort')
            ->paginated(false)
            ->heading(false)
            ->columns(array(
                TextColumn::make('name')
                    ->label(__('admin.fields.category'))
                    ->color('primary')
                    ->weight('bold')
                    ->formatStateUsing(function ($record) {
                        $key = match($record->identifier) {
                            'activities' => 'professional_activity',
                            'educations' => 'education',
                            'employments' => 'employment',
                            'fundings' => 'funding',
                            'works' => 'work',
                            default => $record->identifier
                        };

                        return __("admin.resources.{$key}.plural");
                    })
                    ->url(function ($record) {
                        // Fetch the dynamic admin path, fallback to 'admin'
                        $adminPath = config('app.admin_path', 'admin');
                        $routes = [
                            'works'       => "/{$adminPath}/works",
                            'educations'  => "/{$adminPath}/educations",
                            'employments' => "/{$adminPath}/employments",
                            'activities'  => "/{$adminPath}/professional-activities",
                            'fundings'    => "/{$adminPath}/fundings",
                        ];
                        return url($routes[$record->identifier]?? '/{$adminPath}');
                    }),
                IconColumn::make('is_active')
                    ->label(__('admin.fields.is_active'))
                    ->boolean()
                    ->state(fn ($record) => $record->has_data)
                    ->tooltip(fn ($state) => $state
                        ? __('admin.messages.section_active')
                        : __('admin.messages.section_inactive')
                    ),
            ));
    }
}
