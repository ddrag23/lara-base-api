<?php

namespace App\Constants;

class GenderConstant
{
    public const MAN = 'Laki-laki';
    public const WOMAN = 'Perempuan';

    function getOptions(): array
    {
        return [self::MAN, self::WOMAN];
    }
}
