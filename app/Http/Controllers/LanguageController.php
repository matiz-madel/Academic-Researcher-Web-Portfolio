<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    /**
     * Switch the application's locale.
     */
    public function switch(string $locale): RedirectResponse
    {
        // Fetch active language codes from the database
        $supportedLocales = Language::where('is_active', true)->pluck('code')->toArray();

        // Save to session only if the locale is supported
        if (in_array($locale, $supportedLocales)) {
            Session::put('locale', $locale);
        }

        return redirect()->back();
    }
}
