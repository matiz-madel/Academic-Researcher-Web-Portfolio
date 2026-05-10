<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

class WorkController extends Controller
{
    /**
     * Handle the download of a specific attachment from a Work.
     */
    public function downloadAttachment(Work $work, string $index): StreamedResponse
    {
        // 1. Fetch attachments using Spatie's translation method for the current locale
        $attachments = $work->getTranslation('attachments', app()->getLocale(), false);

        // 2. Ensure $attachments is an array (decode if it was returned as a raw JSON string)
        if (is_string($attachments)) {
            $attachments = json_decode($attachments, true);
        }

        // 3. Check if attachments exist and if the requested index is set
        if (empty($attachments) || !isset($attachments[$index])) {
            abort(404, __('admin.messages.attachment_not_found') ?? 'Attachment not found.');
        }

        $filePath = $attachments[$index];

        // 4. Verify if the physical file actually exists on the disk
        if (!Storage::disk('public')->exists($filePath)) {
            abort(404, __('admin.messages.file_missing') ?? 'Physical file not found on the server.');
        }

        // 5. Build a clean filename for the user
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        // Replace invalid characters (like ':') and any surrounding spaces with a clean dash ' - '
        // Forbidden characters: < > : " / \ | ? * and control characters
        $safeTitle = preg_replace('/\s*[<>:"\/\\\\|?*\x00-\x1F]+\s*/', ' - ', $work->title);

        // Clean up any lingering dashes or spaces at the very beginning or end of the string
        $safeTitle = trim($safeTitle, " -");

        // Fallback in case the title consists only of invalid characters
        if (empty($safeTitle)) {
            $safeTitle = 'Attachment';
        }

        // Calculate a 1-based index for the filename
        $downloadName = "{$safeTitle}.{$extension}";

        // 6. Force the download
        return Storage::disk('public')->download($filePath, $downloadName);
    }
}
