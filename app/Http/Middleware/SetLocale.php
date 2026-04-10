<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
        } else {
            $supportedLocales = \Illuminate\Support\Facades\Cache::rememberForever('active_locales_ordered', function () {
                if (\Illuminate\Support\Facades\Schema::hasTable('languages')) {
                    // Busca as siglas ordenadas pela coluna 'sort'
                    return \App\Models\Language::where('is_active', true)->orderBy('sort')->pluck('code')->toArray();
                }
                return ['fr'];
            });

            if (empty($supportedLocales)) {
                $supportedLocales = ['fr'];
            }

            // Se a língua do usuário não for compatível, o primeiro item da sua lista ordenada assumirá
            $locale = $request->getPreferredLanguage($supportedLocales);

            session()->put('locale', $locale);
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
