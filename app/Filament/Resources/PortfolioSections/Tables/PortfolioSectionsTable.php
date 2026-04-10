<?php

namespace App\Filament\Resources\PortfolioSections\Tables;

use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PortfolioSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table->reorderable('sort')
            ->defaultSort('sort')
            ->columns(array(

                // Coluna 1: Nome com Link de Redirecionamento
                TextColumn::make('name')
                    ->label('Categoria')
                    ->color('primary')
                    ->weight('bold')
                    ->url(function ($record) {
                        // Mapeia o identificador para a URL correta do painel
                        $routes = array(
                            'works' => '/matizmadel/works',
                            'educations' => '/matizmadel/education',
                            'employments' => '/matizmadel/employments',
                            'activities' => '/matizmadel/professional-activities',
                            'fundings' => '/matizmadel/fundings',
                            'links' => '/matizmadel/external-links',
                        );
                        return url($routes[$record->identifier]?? '/admin');
                    }),

                // Coluna 2: Status Automático (Verde se tiver dados, Vermelho se vazio)
                IconColumn::make('is_active')
                    ->label('Status (Automático)')
                    ->boolean()
                    ->state(function ($record) {
                        // Faz uma consulta super rápida no banco para ver se a categoria tem dados
                        return match ($record->identifier) {
                            'works' => \App\Models\Work::exists(),
                            'educations' => \App\Models\Education::exists(),
                            'employments' => \App\Models\Employment::exists(),
                            'activities' => \App\Models\ProfessionalActivity::exists(),
                            'fundings' => \App\Models\Funding::exists(),
                            'links' => \App\Models\ExternalLink::exists(),
                            default => false,
                        };
                    })
                    ->tooltip(function ($state) {
                        return $state
                            ? 'Ativo: A seção aparecerá no site.'
                            : 'Inativo: Adicione informações nesta categoria para ativá-la.';
                    })
                    ->url(function ($record) {
                        // Mapeia o identificador para a URL correta do painel
                        $routes = array(
                            'works' => '/matizmadel/works',
                            'educations' => '/matizmadel/education',
                            'employments' => '/matizmadel/employments',
                            'activities' => '/matizmadel/professional-activities',
                            'fundings' => '/matizmadel/fundings',
                            'links' => '/matizmadel/external-links',
                        );
                        return url($routes[$record->identifier]?? '/admin');
                    }),

            ))
            ->filters([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                //
            ]);
    }
}
