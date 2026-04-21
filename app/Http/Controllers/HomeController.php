<?php

namespace App\Http\Controllers;

use App\Models\LayoutSection;
use App\Models\Metadata;
use App\Models\PublicProfile;
use App\Models\Language;
use App\Models\ExternalLink;
use App\Models\Education;
use App\Models\Employment;
use App\Models\Work;
use App\Models\ProfessionalActivity;
use App\Models\Funding;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the main portfolio page.
     */
    public function index(): View
    {
        $data = $this->getPortfolioData();

        return view('home', $data);
    }

    /**
     * Gathers all necessary data for the portfolio home page safely.
     * Extracted to keep the index method clean and modular.
     */
    private function getPortfolioData(): array
    {
        return [
            'public_profile' => Schema::hasTable('public_profile') ? PublicProfile::first() : null,
            'metadata' => Schema::hasTable('metadata') ? Metadata::first() : new Metadata(),
            'languages' => Schema::hasTable('languages') ? Language::where('is_active', true)->orderBy('sort')->get() : collect(),
            'external_links' => Schema::hasTable('external_links') ? ExternalLink::orderBy('sort')->get() : collect(),
            'categories' => Schema::hasTable('layout_sections') ? LayoutSection::orderBy('sort')->get() : collect(),
            'educations' => Schema::hasTable('education') ? Education::orderBy('start_date', 'desc')->get() : collect(),
            'employments' => Schema::hasTable('employments') ? Employment::orderBy('start_date', 'desc')->get() : collect(),
            'works' => Schema::hasTable('works') ? Work::orderBy('publication_date', 'desc')->get() : collect(),
            'activities' => Schema::hasTable('professional_activities') ? ProfessionalActivity::orderBy('start_date', 'desc')->get() : collect(),
            'fundings' => Schema::hasTable('fundings') ? Funding::orderBy('start_date', 'desc')->get() : collect(),
        ];
    }
}
