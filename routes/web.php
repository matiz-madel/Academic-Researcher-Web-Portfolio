<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Work;
use App\Models\Education;
use App\Models\Employment;
use App\Models\ProfessionalActivity;
use App\Models\Funding;
use App\Models\ExternalLink;
use App\Models\Profile;

// Rota principal que carrega o portfólio
Route::get('/', function () {
    // Busca os dados ordenados pelas datas mais recentes
    $works = Work::orderBy('publication_date', 'desc')->get();
    $educations = Education::orderBy('start_date', 'desc')->get();
    $employments = Employment::orderBy('start_date', 'desc')->get();
    $activities = ProfessionalActivity::orderBy('start_date', 'desc')->get();
    $fundings = Funding::orderBy('start_date', 'desc')->get();
    $external_links = ExternalLink::all();

    // Envia tudo para a view 'welcome'
    return view('home', compact('works', 'educations', 'employments', 'activities', 'fundings', 'external_links'));
});

Route::get('/download', function () {
    $profile = Profile::first();

    // Se não existir perfil ou não houver PDF, retorna erro 404
    if (!$profile || !$profile->resume_pdf) {
        abort(404);
    }

    // Cria o nome bonito para o momento do download
    $nomeBaixado = "{$profile->first_name} {$profile->last_name}.pdf";

    // O Laravel lê o arquivo do disco (mesmo que a pasta esteja bloqueada para a web)
    // e força o download com o nome limpo.
    return Storage::disk('public')->download($profile->resume_pdf, $nomeBaixado);

})->name('resume.download');

// Rota de Idioma (Rota Residual - Fica por último!)
Route::get('/{locale}', function ($locale) {
    // Busca a lista de siglas ativas diretamente do banco de dados para evitar falhas de cache
    $supportedLocales = \App\Models\Language::where('is_active', true)->pluck('code')->toArray();

    // Só salva na sessão se a sigla da URL existir na lista do banco de dados
    if (in_array($locale, $supportedLocales)) {
        \Illuminate\Support\Facades\Session::put('locale', $locale);
    }

    return redirect()->back();
})->where('locale', '[a-zA-Z\_]+')->name('lang.switch');
