<?php

namespace App\Exports;

use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AnggotaExport implements FromQuery, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Kelamin',
            'NIM',
            'Prodi',
            'Alamat'
        ];
    }
    public function map($anggota): array
    {
        return [
            $anggota->id,
            $anggota->nama,
            $anggota->kelamin,
            $anggota->nim,
            $anggota->prodi->name,
            $anggota->alamat,
        ];
    }

    public function query()
    {
        return Anggota::query();
    }
}