<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Models\Work;
use App\Models\Education;
use App\Models\Employment;
use App\Models\ProfessionalActivity;
use App\Models\Funding;
use App\Models\ExternalLink;

// Rota principal que carrega o portfólio
Route::get('/', function () {
    // Busca os dados ordenados pelas datas mais recentes
    $works = Work::orderBy('publication_date', 'desc')->get();
    $educations = Education::orderBy('start_date', 'desc')->get();
    $employments = Employment::orderBy('start_date', 'desc')->get();
    $activities = ProfessionalActivity::orderBy('start_date', 'desc')->get();
    $fundings = Funding::orderBy('start_date', 'desc')->get();
    $links = ExternalLink::all();

    // Envia tudo para a view 'welcome'
    return view('welcome', compact('works', 'educations', 'employments', 'activities', 'fundings', 'links'));
});

Route::get('/{locale}', function ($locale) {
    // Busca a lista de siglas ativas diretamente do banco de dados para evitar falhas de cache
    $supportedLocales = \App\Models\Language::where('is_active', true)->pluck('code')->toArray();

    // Só salva na sessão se a sigla da URL existir na lista do banco de dados
    if (in_array($locale, $supportedLocales)) {
        \Illuminate\Support\Facades\Session::put('locale', $locale);
    }

    return redirect()->back();
})->where('locale', '[a-zA-Z\_]+')->name('lang.switch');
