<?php

namespace App\Constants;

class LastEducationConstant
{
    public const SD = 'SD';
    public const SMP = 'SMP / Mts';
    public const SMA = 'SMA / MA';
    public const S1 = 'S1';
    public const S2 = 'S2';
    public const S3 = 'S3';
    public const D1 = 'D1';
    public const D2 = 'D2';
    public const D3 = 'D3';
    public const D4 = 'D4';
    public const PROFESOR = 'Profesor';
    public const TIDAK_TAHU = 'Tidak Tahu';
    public const BELUM_SEKOLAH = 'Belum Sekolah';
    public const OTHER = 'Lain-lain';

    function getOptions(): array
    {
        return [self::SD, self::SMP, self::SMA, self::D1, self::D2, self::D3, self::D4, self::S1, self::S2, self::S3, self::PROFESOR, self::BELUM_SEKOLAH, self::TIDAK_TAHU,  self::OTHER];
    }
}
