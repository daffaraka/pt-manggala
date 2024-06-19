<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class PegawaiExport implements FromCollection, WithHeadings, WithMapping

{
    use Exportable;

    private $counter = 0;
    public function collection()
    {
        $pegawai = Pegawai::with(['agama','golongans','departments','penempatans','pohs'])->get();

        return $pegawai;
    }


    public function headings(): array
    {
        return [
            'NO',
            'Nama',
            'Golongan',
            'Dept',
            'Lokasi',
            'POH',
            'Tempat Lahir',
            'TGL Lahir',
            'Agama',
            'JK',
            'NIP'

        ];
    }

    public function map($pegawai): array
    {
        return [
            ++$this->counter,  // Increment counter untuk kolom NO
            $pegawai->nama,
            optional($pegawai->golongans)->nama,  // Menggunakan optional() untuk menghindari error jika relasi null
            optional($pegawai->departments)->nama,
            optional($pegawai->penempatans)->nama,
            optional($pegawai->pohs)->nama,
            $pegawai->tmpt_lahir,
            $pegawai->tgl_lahir,
            optional($pegawai->agama)->nmagama,
            $pegawai->jenis_kelamin,
            $pegawai->nip,
        ];
    }

    // public function columnFormats(): array
    // {
    //     return [
    //         // F is the column
    //         'A' => NumberFormat::FORMAT_NUMBER,  // Mengatur kolom A (NIP) sebagai angka
    //     ];
    // }
}
