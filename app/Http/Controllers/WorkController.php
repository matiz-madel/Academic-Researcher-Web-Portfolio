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
        // 1. Check if the work has attachments and if the requested index exists
        if (empty($work->attachments) || !isset($work->attachments[$index])) {
            abort(404, __('admin.messages.attachment_not_found') ?? 'Attachment not found.');
        }

        $filePath = $work->attachments[$index];

        // 2. Verify if the physical file actually exists on the disk
        if (!Storage::disk('public')->exists($filePath)) {
            abort(404, __('admin.messages.file_missing') ?? 'Physical file not found on the server.');
        }

        // 3. Build a clean filename for the user
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $safeTitle = Str::slug($work->title);

        // Find the numerical position (1-based) to append to the filename
        $fileNumber = array_search($index, array_keys($work->attachments)) + 1;
        $downloadName = "{$safeTitle}-arquivo-{$fileNumber}.{$extension}";

        // 4. Force the download
        return Storage::disk('public')->download($filePath, $downloadName);
    }
}
