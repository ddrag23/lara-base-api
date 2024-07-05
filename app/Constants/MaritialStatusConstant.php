<?php

namespace App\Constants;

class MaritialStatusConstant
{
    public const MENIKAH = 'Menikah';
    public const BELUM_MENIKAH = 'Belum Menikah';
    public const JANDA = 'Janda';
    public const DUDA = 'Duda';
    public const OTHER = 'Lain-lain';

    function getOptions(): array
    {
        return [self::MENIKAH, self::BELUM_MENIKAH, self::JANDA, self::DUDA, self::OTHER];
    }
}
