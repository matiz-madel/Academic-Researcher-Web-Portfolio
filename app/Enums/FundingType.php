<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum FundingType: string implements HasLabel
{
    case Award = 'award';
    case Contract = 'contract';
    case Grant = 'grant';
    case SalaryAward = 'salary-award';

    public function getLabel():?string
    {
        return __('enums.funding_type.'. $this->value);
    }
}
