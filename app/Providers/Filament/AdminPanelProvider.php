<?php

namespace App\Providers\Filament;

use App\Http\Middleware\SetLocale;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use LaraZeus\SpatieTranslatable;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Models\PublicProfile;
use App\Models\Metadata;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        // Safely fetch data so migrations don't crash when tables don't exist yet
        $brandName = 'Admin Panel';
        $customPath = config('app.admin_path') ?? 'admin';
        $faviconUrl = asset('favicon.ico');
        $locales = ['fr'];

        if (! app()->runningInConsole()) {
            $brandName = rescue(fn () => PublicProfile::first()?->full_name, $brandName, false) ?: $brandName;

            $favicon = rescue(fn () => Metadata::first()?->favicon, null, false);
            $faviconUrl = $favicon ? asset('storage/' . $favicon) : $faviconUrl;

            $bancoLocales = rescue(fn () => \App\Models\Language::where('active', true)->pluck('code')->toArray(), [], false);
            $locales = !empty($bancoLocales) ? $bancoLocales : $locales;
        }

        return $panel
            ->default()
            ->id('manage')
            ->path($customPath)
            ->login()
            ->brandName($brandName)
            ->favicon($faviconUrl)
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                SetLocale::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugin(
                SpatieTranslatable\SpatieTranslatablePlugin::make()
                ->defaultLocales($locales)
            );
    }
}
