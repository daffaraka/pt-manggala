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
        $pegawai = Pegawai::role('user')->with([
            'agama',
            'negara',
            'darah',
            'keluarga',
            'pendidikan',
            'pelatihan',
            'pengalaman',
            'penempatans',
            'pohs',
            'departments',
            'golongans',
            'jeniskeluars',
            'statusaktivs'
        ])->get();


        return $pegawai;
    }


    public function headings(): array
    {
        return [
            'NO',
            'Nama',
            'Username',
            'Email',
            'NIP',
            'NIK',
            'Tempat Lahir',
            'TGL Lahir',
            'Jenis Kelamin',
            'Desa',
            'Kelurahan',
            'Kecamatan',
            'Kota',
            'Alamat',
            'No HP',
            'Agama',
            'Negara',
            'Golongan Darah',
            'Status Keluarga',
            'Departemen',
            'Penempatan',
            'POH',
            'Golongan',
            'Jenis Keluar',
            'Status Aktiv',
            'Dokumen Satu',
            'Dokumen Dua',
            'Dokumen Tiga',
        ];
    }

    public function map($pegawai): array
    {
        return [
            ++$this->counter,  // Increment counter untuk kolom NO
            $pegawai->nama,
            $pegawai->username,
            $pegawai->email,
            $pegawai->nip,
            $pegawai->nik,
            $pegawai->tmpt_lahir,
            $pegawai->tgl_lahir,
            $pegawai->jenis_kelamin,
            $pegawai->desa,
            $pegawai->kelurahan,
            $pegawai->kecamatan,
            $pegawai->kota,
            $pegawai->alamat,
            $pegawai->nohp,
            optional($pegawai->agama)->nmagama,
            optional($pegawai->negara)->nm_negara,  // Mengambil nama negara dari relasi
            optional($pegawai->darah)->nama_gol_darah,  // Mengambil nama golongan darah dari relasi
            optional($pegawai->keluarga)->nmstatusk,  // Mengambil status keluarga dari relasi
            optional($pegawai->departments)->nama,  // Mengambil nama departemen dari relasi
            optional($pegawai->penempatans)->nama,  // Mengambil nama penempatan dari relasi
            optional($pegawai->pohs)->nama,  // Mengambil nama POH dari relasi
            optional($pegawai->golongans)->nama,  // Mengambil nama golongan dari relasi
            optional($pegawai->jeniskeluars)->nama,  // Mengambil jenis keluar dari relasi
            optional($pegawai->statusaktivs)->nama,  // Mengambil status aktiv dari relasi
            $pegawai->dokumen_satu,
            $pegawai->dokumen_dua,
            $pegawai->dokumen_tiga,
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

