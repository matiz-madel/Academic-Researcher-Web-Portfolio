<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublicProfile;
use Illuminate\Support\Facades\Storage;

class PublicProfileController extends Controller
{
    /**
     * Download the profile resume PDF.
     */
    public function downloadResume()
    {
        $profile = PublicProfile::first();

        // Abort early if the profile doesn't exist at all
        if (!$profile) {
            abort(404, __('admin.messages.resume_not_found') ?? 'Resume not found.');
        }

        // Fetch the path for the current language without falling back to a default
        $path = $profile->getTranslation('resume_pdf', app()->getLocale(), false);

        // Check if the localized path is null OR if the file is missing from storage
        if (!$path || !Storage::disk('public')->exists($path)) {
            abort(404, __('admin.messages.resume_not_found') ?? 'Resume not found.');
        }

        // Format the download name
        $localeSuffix = strtoupper(app()->getLocale());
        $fileName = "{$profile->first_name} {$profile->last_name} - {$localeSuffix}.pdf";

        // Download using the resolved specific language $path
        return Storage::disk('public')->download($path, $fileName);
    }
}
