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
use App\Filament\Resources\PortfolioSections;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class PortfolioSectionsWidget extends TableWidget
{// Faz o widget ocupar a largura total da tela
    protected int | string | array $columnSpan = 'full';

    // Ordem de exibição no Dashboard (1 = topo)
    protected static?int $sort = 1;
    // Título do Widget
    protected static?string $heading = 'Layout da Página Principal';

    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\PortfolioSection::query()) // Define a fonte de dados de forma independente
            ->reorderable('sort')
            ->defaultSort('sort')
            ->paginated(false)
            ->heading(false)
            ->columns(array(

                // Coluna 1: Nome com Link de Redirecionamento
                TextColumn::make('name')
                    ->label('Categoria')
                    ->color('primary')
                    ->weight('bold')
                    ->url(function ($record) {
                        $routes = array(
                            'works' => '/matizmadel/works',
                            'educations' => '/matizmadel/educations',
                            'employments' => '/matizmadel/employments',
                            'activities' => '/matizmadel/professional-activities',
                            'fundings' => '/matizmadel/fundings',
                            'links' => '/matizmadel/external-links',
                        );
                        return url($routes[$record->identifier]?? '/admin');
                    }),

                // Coluna 2: Status Automático (Verde/Vermelho)
                IconColumn::make('is_active')
                    ->label('Status (Automático)')
                    ->boolean()
                    ->state(function ($record) {
                        // Consulta para verificar se há dados
                        return match ($record->identifier) {
                            'works' => Work::exists(),
                            'educations' => Education::exists(),
                            'employments' => Employment::exists(),
                            'activities' => ProfessionalActivity::exists(),
                            'fundings' => Funding::exists(),
                            'links' => ExternalLink::exists(),
                            default => false,
                        };
                    })
                    ->tooltip(function ($state) {
                        return $state
                            ? 'Ativo: A seção aparecerá no site.'
                            : 'Inativo: Adicione informações nesta categoria para ativá-la.';
                    }),
            ));
    }
}
