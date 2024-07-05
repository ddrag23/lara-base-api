<?php

namespace App\Constants;

class ReligionConstant
{
    public const ISLAM = 'Islam';
    public const KRISTEN = 'Kristen';
    public const KATOLIK = 'Katolik';
    public const HINDU = 'Hindu';
    public const BUDHA = 'Budha';
    public const OTHER = 'Lain-lain';

    function getOptions(): array
    {
        return [self::ISLAM, self::KRISTEN, self::KATOLIK, self::HINDU, self::BUDHA, self::OTHER];
    }
}
