<?php

namespace App\Http\Controllers;

use App\Models\ExternalLink;
use Illuminate\Http\RedirectResponse;

class ExternalLinkController extends Controller
{
    /**
     * Log the click and redirect to the target URL.
     * Useful for tracking which parts of your portfolio are most visited.
     */
    public function click(ExternalLink $link): RedirectResponse
    {
        // $link->increment('clicks'); // Future feature
        return redirect()->away($link->getTranslation('url', app()->getLocale()));
    }
}
