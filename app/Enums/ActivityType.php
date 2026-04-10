<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ActivityType: string implements HasLabel
{
    case Membership = 'membership';
    case Service = 'service';
    case InvitedPosition = 'invited-position';
    case Distinction = 'distinction';

    public function getLabel():?string
    {
        return __('enums.activity_type.'. $this->value);
    }
}
