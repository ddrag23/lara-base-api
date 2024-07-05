<?php

namespace App\Constants;

class LastEducationConstant
{
    public const ABRI = 'ABRI';
    public const TIDAK_BEKERJA = 'Belum / Tidak Bekerja';
    public const BURUH = 'Buruh';
    public const KARYAWAN_SWASTA = 'Karyawan Swasta';
    public const NELAYAN = 'Nelayan';
    public const PEDAGANG = 'Pedagang';
    public const PURNAWIRAWAN = 'Purnawirawan';
    public const PETANI = 'Petani';
    public const PNS = 'PNS';
    public const PROFESIONAL = 'Profesional';
    public const WIRASWASTA = 'Wiraswasta';
    public const MAHASISWA = 'Mahasiswa';
    public const PELAJAR = 'Pelajar';
    public const IBU_RUMAH_TANGGA = 'Ibu Rumah Tangga';
    public const DOKTER = 'Dokter';
    public const BUMN = 'BUMN';
    public const GURU = 'Guru';
    public const DOSEN = 'Dosen';
    public const POLISI = 'Polisi';
    public const PENSIUNAN = 'Pensiunan';
    public const OTHER = 'Lain-lain';

    function getOptions(): array
    {
        return [self::ABRI, self::TIDAK_BEKERJA, self::BURUH, self::KARYAWAN_SWASTA, self::BUMN, self::PENSIUNAN, self::PEDAGANG, self::PELAJAR, self::PETANI, self::PNS, self::PROFESIONAL, self::MAHASISWA, self::DOSEN, self::GURU, self::POLISI, self::IBU_RUMAH_TANGGA, self::WIRASWASTA, self::NELAYAN,  self::OTHER];
    }
}
