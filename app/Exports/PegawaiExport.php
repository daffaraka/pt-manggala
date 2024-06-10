<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;

class PegawaiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Pilih hanya kolom-kolom yang diinginkan
        return Pegawai::select('nama', 'kecamatan', 'kabupaten')->get();
    }

    /**
     * Tentukan heading untuk kolom-kolom yang diekspor
     * 
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nama',
            'Kecamatan',
            'Kabupaten'
        ];
    }
}
