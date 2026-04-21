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
        if (!$profile || !$profile->resume_pdf) {
            abort(404, __('admin.messages.resume_not_found') ?? 'Resume not found.');
        }

        $fileName = "{$profile->first_name} {$profile->last_name}.pdf";

        return Storage::disk('public')->download($profile->resume_pdf, $fileName);
    }
}
