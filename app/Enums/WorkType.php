<?php


namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum WorkType: string implements HasLabel
{
    case JournalArticle = 'journal-article';
    case Book = 'book';
    case BookChapter = 'book-chapter';
    case ConferencePaper = 'conference-paper';
    case DissertationThesis = 'dissertation-thesis';
    case Preprint = 'preprint';
    case WorkingPaper = 'working-paper';
    case Other = 'other';

    public function getLabel(): ?string
    {
        return __('enums.work_type.'. $this->value);
    }
}
